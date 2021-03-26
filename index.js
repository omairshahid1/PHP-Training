//global.fetch = require('node-fetch');
const AWS = require('aws-sdk');

exports.handler = function(event, context, callback) {
    return sendRes(event, context, callback);
};

const getDashboardURL = (accountId, dashboardId, userArn, resetDisabled, undoRedoDisabled) => {
    return new Promise((resolve, reject) => {
        const getDashboardParams = {
            AwsAccountId: accountId,
            DashboardId: dashboardId,
            UserArn: userArn,
            IdentityType: 'QUICKSIGHT',
            ResetDisabled: false,
            SessionLifetimeInMinutes: 600,
            UndoRedoDisabled: false
        };

        const quicksightGetDashboard = new AWS.QuickSight({
            region: 'us-west-2',
        });

        quicksightGetDashboard.getDashboardEmbedUrl(getDashboardParams, function(err, data) {
            if (err) {
                console.log(err, err.stack);
                reject(err);
            } else {
                const result = {
                    "statusCode": 200,
                    /*"headers": {
                        "Access-Control-Allow-Origin": "*",
                        "Access-Control-Allow-Headers": "Content-Type",
                        "Content-Type": "application/json",
                        "Access-Control-Allow-Credentials" : true
                    },*/
                    "body": JSON.stringify(data),
                    "isBase64Encoded": false
                }
                resolve(result);
            }
        });
    });
}

const sendRes = (event, context, callback) => {

    const accountId = process.env.AwsAccountId;
    const dashboardId = event.dashboardId; //"22a3f9fa-5388-4ebc-be64-e3b8ff06c081";
    const userArn = process.env.UserArn+event.userName;
    const resetDisabledParam = false;
    const undoRedoDisabledParam = false;
    
    console.log("Initial variables:");
    console.log(`accountID = ${accountId}`);
    console.log(`dashboardID = ${dashboardId}`);
    console.log(`userArn = ${userArn}`);
    console.log(`resetDisabledParam = ${resetDisabledParam}`);
    console.log(`undoRedoDisabledParam = ${undoRedoDisabledParam}`);

    if (!accountId) {
        const error = new Error("accountId is unavailable");
        callback(error);
    }
    if (!dashboardId) {
        const error = new Error("dashboardId is unavailable");
        callback(error);
    }
    if (!userArn) {
        const error = new Error("userArn is unavailable");
        callback(error);
    }
    
    if (!resetDisabledParam) {
        //const error = new Error("resetDisabledParam flag is unavailable");
        //callback(error);
    }
    if (!undoRedoDisabledParam) {
        //const error = new Error("undoRedoDisabledParam flag is unavailable");
        //callback(error);
    }

    const resetDisabled = resetDisabledParam === "true" ? true : false;
    const undoRedoDisabled = undoRedoDisabledParam === "true" ? true : false;
    
    const getDashboardEmbedUrlPromise = getDashboardURL(accountId, dashboardId, userArn, resetDisabled, undoRedoDisabled);
    getDashboardEmbedUrlPromise.then(function(result){
        const dashboardEmbedUrlResult = result;
        if (dashboardEmbedUrlResult && dashboardEmbedUrlResult.statusCode === 200) {
            callback(null, result);
        } else {
            console.log('getDashboardEmbedUrl failed');
            callback(null, null);
        }
    }, function(err){
        console.log(err, err.stack);
        callback(null, err);
    });
}