#!/home/mqc4m7qvaajj/public_html/env/bin/python3

from flask import Flask, render_template, request, flash, redirect
import markdown2
import os
import yaml
import smtplib
import secrets

app = Flask(__name__)

app.static_url_path = '/static'

# Set a secret key for the application
app.secret_key = secrets.token_hex(16)  # Generate a secure random key

SENDER_EMAIL = "borddelamerlitr@gmail.com"
SENDER_PASSWORD = "2905Zigmund12"
RECIPIENT_EMAIL = "khralenok.g@gmail.com"

def send_email(subject, email, name):
    try:
        server = smtplib.SMTP("smtp.gmail.com", 587)
        server.starttls()
        server.login(SENDER_EMAIL, SENDER_PASSWORD)
        message = f"Subject: {subject}\n\n{email}\n\n{name}"
        server.sendmail(SENDER_EMAIL, RECIPIENT_EMAIL, message)
        server.quit()
        return True
    except Exception as e:
        print("Email sending failed:", e)
        return False


def preprocess_markdown(content):
    # Split the content into metadata and actual Markdown content
    metadata, markdown_content = content.split('---', 2)[1:]

    # Parse YAML metadata
    metadata_dict = yaml.safe_load(metadata)

    # Convert Markdown content to HTML
    html_content = markdown2.markdown(markdown_content.strip())

    return html_content, metadata_dict


def section_render(section,main_page):
    section_items = []
    # Path to the directory containing portfolio Markdown files
    section_dir = os.path.join(app.root_path, str(section), 'content')

    # Iterate over each Markdown file in the section directory
    for filename in os.listdir(section_dir):
        if filename.endswith('.md'):
            with open(os.path.join(section_dir, filename), 'r') as f:

                # Read the Markdown content
                markdown_content = f.read()
                
                # Extract title from the filename
                url = filename[:-3]  # Remove the '.md' extension

                # Split content into metadata and body
                metadata, body = markdown_content.split('---\n', 2)[1:]
                
                # Parse YAML metadata
                metadata_dict = yaml.safe_load(metadata)
                
                if main_page == False:

                    # Extract title and cover from metadata
                    title = metadata_dict['title']
                    cover = metadata_dict.get('cover', None)  # Get cover if it exists, otherwise None
                    date = metadata_dict['date']

                    # Convert Markdown content to HTML
                    html_content = markdown2.markdown(markdown_content)

                    # Append portfolio item to the list
                    section_items.append({'url': url,'date': date, 'title': title, 'cover': cover, 'content': html_content})
                else:
                    if 'display' in metadata_dict and metadata_dict['display'] == 1:
                        # Extract title and cover from metadata
                        title = metadata_dict['title']
                        cover = metadata_dict.get('cover', None)  # Get cover if it exists, otherwise None
                        date = metadata_dict['date']

                        # Convert Markdown content to HTML
                        html_content = markdown2.markdown(markdown_content)

                        # Append portfolio item to the list
                        section_items.append({'url': url,'date': date, 'title': title, 'cover': cover, 'content': html_content})

    # Sort portfolio items by date
    section_items.sort(key=lambda x: x['date'], reverse=True)

    # Render the index HTML template           
    return section_items

def item_render(item_id, section):
    # Construct the filename for the specified item_id
    filename = f"{item_id}.md"

    # Path to the Markdown file for the portfolio item
    item_file = os.path.join(app.root_path, str(section), 'content', filename)

    # Check if the Markdown file exists
    if os.path.exists(item_file):
        # Read the content of the Markdown file and convert it to HTML
        with open(item_file, 'r') as f:
            html_content, metadata = preprocess_markdown(f.read())

        # Render the portfolio item HTML template
        return html_content, metadata
    else:
        # If the file doesn't exist, render an error page or handle it appropriately
        return "Page not found", 404

# Define routes
@app.route('/')
def index():
    return render_template('index.html', portfolio_items=section_render('portfolio', True))

@app.route('/portfolio')
def portfolio():
    return render_template('portfolio.html', portfolio_items=section_render('portfolio', False))

@app.route('/portfolio/<item_id>')
def portfolio_item(item_id):
    return render_template('article.html', content=item_render(item_id, 'portfolio')[0], metadata=item_render(item_id, 'portfolio')[1])
    
@app.route('/blog')
def blog():
    return render_template('blog.html', blog_items=section_render('blog', False))

@app.route('/blog/<item_id>')
def blog_item(item_id):
    return render_template('article.html', content=item_render(item_id, 'blog')[0], metadata=item_render(item_id, 'blog')[1])

@app.route('/art')
def art():
    return render_template('art.html', art_items=section_render('art', False))

@app.route('/art/<item_id>')
def art_item(item_id):
    return render_template('article.html', content=item_render(item_id, 'art')[0], metadata=item_render(item_id, 'art')[1])

@app.route('/services')
def services():
    return render_template('services.html')

@app.route('/reach', methods=['POST'])
def subscribe():
    email = request.form['email']
    name = request.form['name']
    if send_email("Qualified lead", f"Email: {email}",f"Email: {name}"):
        flash("I'll message you soon!", "success")
    else:
        flash("Something gone wrong. Please try again later.", "danger")
    return redirect(request.referrer)

@app.errorhandler(404)
def page_not_found(e):
    return render_template('404.html'), 404

# Run the app
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8080,debug=True)
