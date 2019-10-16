<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <link rel="icon" href="<?= base_url('images/ico.jpg') ?>" sizes="192x192">

    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
         @page {
             margin: 100px 0px;
         }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 2cm;
            font-style: normal;

        }

        .ui.table.bordered {
          border: solid black 2px;
          border-collapse: collapse;
          width: 100%;
        }

        .ui.table.bordered td {
          border: solid black 1px;
          border-collapse: collapse;
          padding:10px;
        }

        .ui.table.bordered td img {
          padding: 10px;
        }

        .ui.table.bordered td.center.aligned {
          text-align : center;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: -100px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            text-align: center;
            line-height: 35px;
        }

        main {
          position: sticky;
          font-size : 12px;
          margin-top : -2px;
          margin-left: 1px;
          margin-right: 1px;
          border: solid black 1.5px;
          border-collapse: collapse;
          width: 100%;
        }

        main p {
          margin-left: 5px;
          margin-right: 5px;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            text-align: center;
            line-height: 35px;
            clear: both;
        }
        .footer .page-number:after {
          content: counter(page);
        }
    </style>



    </head>
    <body>
        <script type="text/php">
         
        </script>
        <!-- Define header and footer blocks before your content -->
        <header>
            <table class="ui table bordered">
                <tr>
                    <td class="center aligned" width="30%"><img src="https://www.indonesiaferry.co.id/assets/images/logo2.png"></td>
                    <td class="center aligned" width="60%"><h5>HEALTH SAFETY AND ENVIRONMENT FORM</h5></td>
                </tr>
                <tr>
                    <td class="center aligned" colspan="2">Health, Safety and Environment Report</td>
                </tr>
            </table>
        </header>


        <table class="ui table bordered" style="font-size: 13px;width: 100%;">
            <tr>
                <td rowspan="3" class="" style="width: 350px; vertical-align:top;">
                    <h4>Judul :</h4>
                     ads

                </td>
                <td class="" style="width: 340px">
                    <h4>
                        Nomor :
                    </h4>
                    ads


                </td>
            </tr>
            <tr>
                <td class="" style="width: 340px">
                    <h4>
                        Tanggal :
                    </h4>
                    ads
                </td>
            </tr>
            <tr>
                <td class="" style="width: 340px">
                    <h4>
                        Di Ajukan Kepada :
                    </h4>
                    ads
                </td>
            </tr>
            <tr>
                <td rowspan="4" class="" style="width: 350px;vertical-align:top;">
                    <h4>
                        Subyek :
                    </h4>
                    ads
                </td>
                <td class="" style="width: 340px">
                    <h4>
                        DiKeluarkan Oleh :
                    </h4>
                    ads
                </td>
            </tr>
            <tr>
                <td class="" style="width: 340px">
                    <h4>
                        Disiapkan Oleh :
                    </h4>
                    ads
                </td>
            </tr>
            <tr>
                <td class="" style="width: 340px">
                    <h4>
                        Diperiksa Oleh :
                    </h4>
                    ads
                </td>
            </tr>
            <tr>
                <td class="" style="width: 340px">
                    <h4>
                        Di Setujui Oleh :
                    </h4>
                    ads
                </td>
            </tr>
        </table>
        <main>
            <p style="page-break-after: never;font-size: 13px;">
                <h4 style="padding-top: 15px;margin-left: 5px">Distribusi :</h4>
                    sda
            </p>
        </main>
        
    </body>
</html>
