<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .page{
            padding:40px 0;
            background:#fff;
            font-family: 'Arvo', serif;
        }

        .page img{
            width:100%;
        }

        .bg h1 {
            font-size: 80px;
        }

        .bg{
            background-image: url('<?= base_url('assets/img/error.gif') ?>');
            height: 400px;
            background-position: center;
        }

        .link{
            text-decoration: none!important;
            color: #fff!important;
            padding: 10px 20px;
            background: #e91e63;
            margin: 20px 0;
            display: inline-block;
        }

        .link-outline{
            text-decoration: none!important;
            color: #e91e63!important;
            padding: 8px 18px;
            border: 2px solid #e91e63;
            margin: 20px 0;
            display: inline-block;
        }

        .content{
            margin-top:-50px;
        }
    </style>
</head>
<body>
    <section class="page">
        <div class="container">
            <div class="row">	
                <div class="col-sm-10 col-sm-offset-1  text-center">
                    <div class="bg">
                        <h1 class="text-center"><?= $data['code'] ?? 'Oh no' ?></h1>
                    </div>
                    <div class="content">
                        <h4><?= $data['message'] ?? '' ?></h4>
                        <a href="javascript:history.back()" class="link-outline">Back</a>
                        <a href="<?= base_url() ?>" class="link">Go to Home</a>
                        <?php if ($data['trace'] !== '' && ENV !== 'production') : ?>
                        <hr>
                        <code><?= $trace ?></code>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>