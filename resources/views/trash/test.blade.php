<!doctype html>

<html lang="en">

<head>
    <title>Fully Customized with Form Validation | Form to Wizard</title>

    <style>
        body { font-family:Lucida Sans, Arial, Helvetica, Sans-Serif; font-size:13px; margin:20px;}
        #header { text-align:center; border-bottom:solid 1px #b2b3b5; margin: 0 0 20px 0; }
        fieldset { border:none; width:320px;}
        legend { font-size:18px; margin:0px; padding:10px 0px; color:#b0232a; font-weight:bold;}

        button, .prev, .next { background-color:#b0232a; padding:5px 10px; color:#fff; text-decoration:none;}
        button:hover, .prev:hover, .next:hover { background-color:#000; text-decoration:none;}

        button { border: none; }

        #controls h1 { color: #666; display: inline-block; margin: 0 0 8px 0 }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" />
    <style>
        .prev{float:left}
        .next{float:right}
        .steps{list-style:none;width:100%;overflow:hidden;margin:0;padding:0}
        .steps li{color:#b0b1b3;font-size:24px;float:left;padding:10px;transition:all .3s;-moz-transition:all .3s;-webkit-transition:all .3s;-o-transition:all .3s}
        .steps li span{font-size:11px;display:block}
        .steps li.current{color:#000}
        .breadcrumb{height:37px}
        .breadcrumb li{background:#eee;font-size:14px}
        .breadcrumb li.current:after{border-top:18px solid transparent;border-bottom:18px solid transparent;border-left:6px solid #666;content:' ';position:absolute;top:0;right:-6px}
        .breadcrumb li.current{background:#666;color:#eee;position:relative}
        .breadcrumb li:last-child:after{border:none}
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type='text/javascript' src={{ '../../js/jquery.formtowizard.js' }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-en.min.js"></script>

    <script>
        $( function() {
            var $signupForm = $( '#SignupForm' );

            $signupForm.validationEngine();

            $signupForm.formToWizard({
                submitButton: '送出',
                showProgress: true, //default value for showProgress is also true
                nextBtnName: '下一步 >>',
                prevBtnName: '<< 上一步',
                showStepNo: false,
                validateBeforeNext: function() {
                    return $signupForm.validationEngine( 'validate' );
                }
            });


            $( '#txt_stepNo' ).change( function() {
                $signupForm.formToWizard( 'GotoStep', $( this ).val() );
            });

            $( '#btn_next' ).click( function() {
                $signupForm.formToWizard( 'NextStep' );
            });

            $( '#btn_prev' ).click( function() {
                $signupForm.formToWizard( 'PreviousStep' );
            });
        });
    </script>

</head>

<body>
<form id="SignupForm" action="">
    <fieldset>
        <legend>會員資料</legend>
        @include('test.member')
    </fieldset>
    <fieldset>
        <legend>教會名錄</legend>
        @include('test.church')
    </fieldset>
    <fieldset>
        <legend>信用卡資料</legend>
        @include('test.credit_card')
    </fieldset>
    <p>
        <input id="SaveAccount" type="button" value="Submit form" />
    </p>
</form>
</body>
</html>
