<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ "Mail Cron Job"}}</title>
    </head>
    <body >
        <div style="max-width: 680px;margin: 0 auto;">
            <div style="padding: 52px 25px;color: #58585b;font-weight: 300;line-height: 30px;font-size: 16px;">
                <h3 style ='font-size:16pt;font-family:CordiaUPC;vertical-align:middle;font-weight:bold;'> Update Table Pt_inv_pif_fg Completed {{ $mail_data["count_fg"] }} Reccoed </h3>
				<h3 style ='font-size:16pt;font-family:CordiaUPC;vertical-align:middle;font-weight:bold;'> Update Table Pt_inv_pif_master Completed {{ $mail_data["count_master"] }} Reccoed </h3>
				<h3 style ='font-size:16pt;font-family:CordiaUPC;vertical-align:middle;font-weight:bold;'> Update Table Pt_inv_pif_retail_inner Completed {{ $mail_data["count_retail_inner"] }} Reccoed </h3>
				<h3 style ='font-size:16pt;font-family:CordiaUPC;vertical-align:middle;font-weight:bold;'> Update Table Pt_inv_pif_log Completed {{ $mail_data["count_log"] }} Reccoed </h3>
            </div>
        </div>
    </body>
</html>