 // Function to calculate metrics
function calculateMetrics() {
    const investments = parseFloat(document.getElementById('investments').value);
    const desiredIncome = parseFloat(document.getElementById('desiredIncome').value);
    const averageBill = parseFloat(document.getElementById('averageBill').value);
    const postsPerMonth = parseInt(document.getElementById('postsPerMonth').value);
    const clickTroughRate = parseFloat(document.getElementById('clickTroughRate').value) / 100;
    const conversionRate = parseFloat(document.getElementById('conversionRate').value) / 100;
    const followers = parseInt(document.getElementById('followers').value);
    const avgViews = parseInt(document.getElementById('avgViews').value);
    const returnOfInvestment = (desiredIncome / investments) * 100;
    const viewsPerConversion = Math.round(1 / (clickTroughRate * conversionRate));
    const conversionPerMonth = Math.round(desiredIncome / averageBill);
    const viewsPerMonth = viewsPerConversion * conversionPerMonth;
    const viewsPerPost = Math.round(viewsPerMonth / postsPerMonth);
    const neededFolowers = Math.round(viewsPerPost / (avgViews / followers));
    const postBudget = Math.round(investments / postsPerMonth);
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = `
        You expect a <b>${returnOfInvestment.toFixed(2)}% Return Of Investments</b>. Such a result requires at least <b>${conversionPerMonth} conversions per month</b>. To achieve it you need <b>${viewsPerConversion} views per conversion</b>. It means every post should gather at least <b>${viewsPerMonth} Views Per Month</b>. In other words, each of your posts should gather about <b>${viewsPerPost} views</b>. To reach such without boosting you need <b>${neededFolowers} followers</b>. If this value is 2+ times higher than you already have, you should boost your posts. But keep in mind that you have only <b>${postBudget}$</b> to craft and boost your post.
        `;
        }
    // Attach event listeners to input fields
    const inputFields = document.querySelectorAll('input[type="number"]');
    inputFields.forEach(input => {
        input.addEventListener('input', calculateMetrics);
        });
    // Calculate metrics initially
    calculateMetrics();