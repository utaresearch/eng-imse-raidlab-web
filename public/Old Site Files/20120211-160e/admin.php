<?php
require_once( dirname(__FILE__).'/form.lib.php' );

define( 'PHPFMG_USER', "Harrison.arms@gmail.com" ); // must be a email address. for sending password to you.
define( 'PHPFMG_PW', "20120211-160e" );

?>
<?php
/**
 * Copyright (C) : http://www.formmail-maker.com
*/

# main
# ------------------------------------------------------
error_reporting( E_ERROR ) ;
phpfmg_admin_main();
# ------------------------------------------------------




function phpfmg_admin_main(){
    $mod  = isset($_REQUEST['mod'])  ? $_REQUEST['mod']  : '';
    $func = isset($_REQUEST['func']) ? $_REQUEST['func'] : '';
    $function = "phpfmg_{$mod}_{$func}";
    if( !function_exists($function) ){
        phpfmg_admin_default();
        exit;
    };

    // no login required modules
    $public_modules   = false !== strpos('|captcha|', "|{$mod}|");
    $public_functions = false !== strpos('|phpfmg_mail_request_password||phpfmg_filman_download||phpfmg_image_processing||phpfmg_dd_lookup|', "|{$function}|") ;   
    if( $public_modules || $public_functions ) { 
        $function();
        exit;
    };
    
    return phpfmg_user_isLogin() ? $function() : phpfmg_admin_default();
}

function phpfmg_admin_default(){
    if( phpfmg_user_login() ){
        phpfmg_admin_panel();
    };
}



function phpfmg_admin_panel()
{    
    phpfmg_admin_header();
    phpfmg_writable_check();
?>    
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td valign=top style="padding-left:280px;">

<style type="text/css">
    .fmg_title{
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
    }
    
    .fmg_sep{
        width:32px;
    }
    
    .fmg_text{
        line-height: 150%;
        vertical-align: top;
        padding-left:28px;
    }

</style>

<script type="text/javascript">
    function deleteAll(n){
        if( confirm("Are you sure you want to delete?" ) ){
            location.href = "admin.php?mod=log&func=delete&file=" + n ;
        };
        return false ;
    }
</script>


<div class="fmg_title">
    1. Email Traffics
</div>
<div class="fmg_text">
    <a href="admin.php?mod=log&func=view&file=1">view</a> &nbsp;&nbsp;
    <a href="admin.php?mod=log&func=download&file=1">download</a> &nbsp;&nbsp;
    <?php 
        if( file_exists(PHPFMG_EMAILS_LOGFILE) ){
            echo '<a href="#" onclick="return deleteAll(1);">delete all</a>';
        };
    ?>
</div>


<div class="fmg_title">
    2. Form Data
</div>
<div class="fmg_text">
    <a href="admin.php?mod=log&func=view&file=2">view</a> &nbsp;&nbsp;
    <a href="admin.php?mod=log&func=download&file=2">download</a> &nbsp;&nbsp;
    <?php 
        if( file_exists(PHPFMG_SAVE_FILE) ){
            echo '<a href="#" onclick="return deleteAll(2);">delete all</a>';
        };
    ?>
</div>

<div class="fmg_title">
    3. Form Generator
</div>
<div class="fmg_text">
    <a href="http://www.formmail-maker.com/generator.php" onclick="document.frmFormMail.submit(); return false;" title="<?php echo htmlspecialchars(PHPFMG_SUBJECT);?>">Edit Form</a> &nbsp;&nbsp;
    <a href="http://www.formmail-maker.com/generator.php" >New Form</a>
</div>
    <form name="frmFormMail" action='http://www.formmail-maker.com/generator.php' method='post' enctype='multipart/form-data'>
    <input type="hidden" name="uuid" value="<?php echo PHPFMG_ID; ?>">
    <input type="hidden" name="external_ini" value="<?php echo function_exists('phpfmg_formini') ?  phpfmg_formini() : ""; ?>">
    </form>

		</td>
	</tr>
</table>

<?php
    phpfmg_admin_footer();
}



function phpfmg_admin_header( $title = '' ){
    header( "Content-Type: text/html; charset=" . PHPFMG_CHARSET );
?>
<html>
<head>
    <title><?php echo '' == $title ? '' : $title . ' | ' ; ?>PHP FormMail Admin Panel </title>
    <meta name="keywords" content="PHP FormMail Generator, PHP HTML form, send html email with attachment, PHP web form,  Free Form, Form Builder, Form Creator, phpFormMailGen, Customized Web Forms, phpFormMailGenerator,formmail.php, formmail.pl, formMail Generator, ASP Formmail, ASP form, PHP Form, Generator, phpFormGen, phpFormGenerator, anti-spam, web hosting">
    <meta name="description" content="PHP formMail Generator - A tool to ceate ready-to-use web forms in a flash. Validating form with CAPTCHA security image, send html email with attachments, send auto response email copy, log email traffics, save and download form data in Excel. ">
    <meta name="generator" content="PHP Mail Form Generator, phpfmg.sourceforge.net">

    <style type='text/css'>
    body, td, label, div, span{
        font-family : Verdana, Arial, Helvetica, sans-serif;
        font-size : 12px;
    }
    </style>
</head>
<body  marginheight="0" marginwidth="0" leftmargin="0" topmargin="0">

<table cellspacing=0 cellpadding=0 border=0 width="100%">
    <td nowrap align=center style="background-color:#024e7b;padding:10px;font-size:18px;color:#ffffff;font-weight:bold;width:250px;" >
        Form Admin Panel
    </td>
    <td style="padding-left:30px;background-color:#86BC1B;width:100%;font-weight:bold;" >
        &nbsp;
<?php
    if( phpfmg_user_isLogin() ){
        echo '<a href="admin.php" style="color:#ffffff;">Main Menu</a> &nbsp;&nbsp;' ;
        echo '<a href="admin.php?mod=user&func=logout" style="color:#ffffff;">Logout</a>' ;
    }; 
?>
    </td>
</table>

<div style="padding-top:28px;">

<?php
    
}


function phpfmg_admin_footer(){
?>

</div>

<div style="color:#cccccc;text-decoration:none;padding:18px;font-weight:bold;">
	:: <a href="http://phpfmg.sourceforge.net" target="_blank" title="Free Mailform Maker: Create read-to-use Web Forms in a flash. Including validating form with CAPTCHA security image, send html email with attachments, send auto response email copy, log email traffics, save and download form data in Excel. " style="color:#cccccc;font-weight:bold;text-decoration:none;">PHP FormMail Generator</a> ::
</div>

</body>
</html>
<?php
}


function phpfmg_image_processing(){
    $img = new phpfmgImage();
    $img->out_processing_gif();
}


# phpfmg module : captcha
# ------------------------------------------------------
function phpfmg_captcha_get(){
    $img = new phpfmgImage();
    $img->out();
    $_SESSION[PHPFMG_ID.'fmgCaptchCode'] = $img->text ;
}



function phpfmg_captcha_generate_images(){
    for( $i = 0; $i < 50; $i ++ ){
        $file = "$i.png";
        $img = new phpfmgImage();
        $img->out($file);
        $data = base64_encode( file_get_contents($file) );
        echo "'{$img->text}' => '{$data}',\n" ;
        unlink( $file );
    };
}


function phpfmg_dd_lookup(){
    $paraOk = ( isset($_REQUEST['n']) && isset($_REQUEST['lookup']) && isset($_REQUEST['field_name']) );
    if( !$paraOk )
        return;
        
    $base64 = phpfmg_dependent_dropdown_data();
    $data = @unserialize( base64_decode($base64) );
    if( !is_array($data) ){
        return ;
    };
    
    
    foreach( $data as $field ){
        if( $field['name'] == $_REQUEST['field_name'] ){
            $nColumn = intval($_REQUEST['n']);
            $lookup  = $_REQUEST['lookup']; // $lookup is an array
            $dd      = new DependantDropdown(); 
            echo $dd->lookupFieldColumn( $field, $nColumn, $lookup );
            return;
        };
    };
    
    return;
}


function phpfmg_filman_download(){
    if( !isset($_REQUEST['filelink']) )
        return ;
        
    $info =  @unserialize(base64_decode($_REQUEST['filelink']));
    if( !isset($info['recordID']) ){
        return ;
    };
    
    $file = PHPFMG_SAVE_ATTACHMENTS_DIR . $info['recordID'] . '-' . $info['filename'];
    phpfmg_util_download( $file, $info['filename'] );
}


class phpfmgDataManager
{
    var $dataFile = '';
    var $columns = '';
    var $records = '';
    
    function phpfmgDataManager(){
        $this->dataFile = PHPFMG_SAVE_FILE; 
    }
    
    function parseFile(){
        $fp = @fopen($this->dataFile, 'rb');
        if( !$fp ) return false;
        
        $i = 0 ;
        $phpExitLine = 1; // first line is php code
        $colsLine = 2 ; // second line is column headers
        $this->columns = array();
        $this->records = array();
        $sep = chr(0x09);
        while( !feof($fp) ) { 
            $line = fgets($fp);
            $line = trim($line);
            if( empty($line) ) continue;
            $line = $this->line2display($line);
            $i ++ ;
            switch( $i ){
                case $phpExitLine:
                    continue;
                    break;
                case $colsLine :
                    $this->columns = explode($sep,$line);
                    break;
                default:
                    $this->records[] = explode( $sep, phpfmg_data2record( $line, false ) );
            };
        }; 
        fclose ($fp);
    }
    
    function displayRecords(){
        $this->parseFile();
        echo "<table border=1 style='width=95%;border-collapse: collapse;border-color:#cccccc;' >";
        echo "<tr><td>&nbsp;</td><td><b>" . join( "</b></td><td>&nbsp;<b>", $this->columns ) . "</b></td></tr>\n";
        $i = 1;
        foreach( $this->records as $r ){
            echo "<tr><td align=right>{$i}&nbsp;</td><td>" . join( "</td><td>&nbsp;", $r ) . "</td></tr>\n";
            $i++;
        };
        echo "</table>\n";
    }
    
    function line2display( $line ){
        $line = str_replace( array('"' . chr(0x09) . '"', '""'),  array(chr(0x09),'"'),  $line );
        $line = substr( $line, 1, -1 ); // chop first " and last "
        return $line;
    }
    
}
# end of class



# ------------------------------------------------------
class phpfmgImage
{
    var $im = null;
    var $width = 73 ;
    var $height = 33 ;
    var $text = '' ; 
    var $line_distance = 8;
    var $text_len = 4 ;

    function phpfmgImage( $text = '', $len = 4 ){
        $this->text_len = $len ;
        $this->text = '' == $text ? $this->uniqid( $this->text_len ) : $text ;
        $this->text = strtoupper( substr( $this->text, 0, $this->text_len ) );
    }
    
    function create(){
        $this->im = imagecreate( $this->width, $this->height );
        $bgcolor   = imagecolorallocate($this->im, 255, 255, 255);
        $textcolor = imagecolorallocate($this->im, 0, 0, 0);
        $this->drawLines();
        imagestring($this->im, 5, 20, 9, $this->text, $textcolor);
    }
    
    function drawLines(){
        $linecolor = imagecolorallocate($this->im, 210, 210, 210);
    
        //vertical lines
        for($x = 0; $x < $this->width; $x += $this->line_distance) {
          imageline($this->im, $x, 0, $x, $this->height, $linecolor);
        };
    
        //horizontal lines
        for($y = 0; $y < $this->height; $y += $this->line_distance) {
          imageline($this->im, 0, $y, $this->width, $y, $linecolor);
        };
    }
    
    function out( $filename = '' ){
        if( function_exists('imageline') ){
            $this->create();
            if( '' == $filename ) header("Content-type: image/png");
            ( '' == $filename ) ? imagepng( $this->im ) : imagepng( $this->im, $filename );
            imagedestroy( $this->im ); 
        }else{
            $this->out_predefined_image(); 
        };
    }

    function uniqid( $len = 0 ){
        $md5 = md5( uniqid(rand()) );
        return $len > 0 ? substr($md5,0,$len) : $md5 ;
    }
    
    function out_predefined_image(){
        header("Content-type: image/png");
        $data = $this->getImage(); 
        echo base64_decode($data);
    }
    
    // Use predefined captcha random images if web server doens't have GD graphics library installed  
    function getImage(){
        $images = array(
			'D0CE' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWUlEQVR4nGNYhQEaGAYTpIn7QgMYAhhCHUMDkMQCpjCGMDoEOiCrC2hlbWVtEEQTE2l0bWCEiYGdFLV02srUVStDs5Dch6YOjxgWO7C4BZubByr8qAixuA8A9xbLMPGO5hkAAAAASUVORK5CYII=',
			'94E6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7WAMYWllDHaY6IImJTGGYytrAEBCAJBbQyhDK2sDoIIAixugKEkN237SpS5cuDV2ZmoXkPlZXkVagOhTzGFpFQ12BekWQxARaGUDqUMSAbmlFdws2Nw9U+FERYnEfAO0gyl8LWulrAAAAAElFTkSuQmCC',
			'CB3B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7WENEQxhDGUMdkMREWkVaWRsdHQKQxAIaRRodGgIdRJDFgCoZEOrATopaNTVs1dSVoVlI7kNTBxPDNA+LHdjcgs3NAxV+VIRY3AcAWHfNJX9upawAAAAASUVORK5CYII=',
			'DA0B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QgMYAhimMIY6IIkFTGEMYQhldAhAFmtlbWV0dHQQQRETaXRtCISpAzspaum0lamrIkOzkNyHpg4qJhoKEkM3zxHdjikijQ5obgkNAIqhuXmgwo+KEIv7ALYPzbG/GZdxAAAAAElFTkSuQmCC',
			'10A7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7GB0YAhimMIaGIImxOjCGMIQyNIggiYk6sLYyOjqgiDE6iDS6NgQAIcJ9K7OmrUxdFbUyC8l9UHWtDOh6QwOmoIqxtrI2BASgijGGsDYEOiCLiYYwBKCLDVT4URFicR8AgwXJSmShysMAAAAASUVORK5CYII=',
			'C61A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7WEMYQximMLQii4m0srYyhDBMdUASC2gUaQSqDAhAFmsQaWCYwuggguS+qFXTwlZNW5k1Dcl9AQ2irUjqYHobHaYwhoag2eGApg7sFjQxkJsZQx1RxAYq/KgIsbgPABZsy0n26lFCAAAAAElFTkSuQmCC',
			'DD29' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QgNEQxhCGaY6IIkFTBFpZXR0CAhAFmsVaXRtCHQQQRNzQIiBnRS1dNrKrJVZUWFI7gOra2WYiqF3CkMDhlgAA6odILc4MKC4BeRm1tAAFDcPVPhREWJxHwCU584T6xqvSQAAAABJRU5ErkJggg==',
			'2D57' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7WANEQ1hDHUNDkMREpoi0soJoJLGAVpFGVzQxBpDYVKAcsvumTVuZmpm1MgvZfQEijQ5AE5DtZXQAi01BcUsDyI6AAGQxkQaRVkZHRwdksdBQ0RCGUEYUsYEKPypCLO4DAEXozARkAtrCAAAAAElFTkSuQmCC',
			'65F4' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7WANEQ1lDAxoCkMREpog0sDYwNCKLBbSAxVpRxBpEQoBiUwKQ3BcZNXXp0tBVUVFI7guZwtDo2sDogKK3FSwWGoIiJgIUY0BzC2srK5oYawBjCLrYQIUfFSEW9wEAIt7Nx9v3NLcAAAAASUVORK5CYII=',
			'D2C0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QgMYQxhCHVqRxQKmsLYyOgRMdUAWaxVpdG0QCAhAEWMAijE6iCC5L2rpqqVLV63MmobkPqC6KawIdTCxAEwxRgdWdDvAOlHdEhogGuqA5uaBCj8qQizuAwD5Pc2NUJW8BAAAAABJRU5ErkJggg==',
			'E0BD' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAW0lEQVR4nGNYhQEaGAYTpIn7QkMYAlhDGUMdkMQCGhhDWBsdHQJQxFhbWRsCHURQxEQaXYHqRJDcFxo1bWVq6MqsaUjuQ1OHEMMwD5sdmG7B5uaBCj8qQizuAwDW/My9wmRGgwAAAABJRU5ErkJggg==',
			'C907' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7WEMYQximMIaGIImJtLK2MoQCaSSxgEaRRkdHB1SxBpFGVyAZgOS+qFVLl6auilqZheS+gAbGQKC6VgYUvQwgvVNQxBpZQHYEMGC4hdEBi5tRxAYq/KgIsbgPAMyAzG31Rb4dAAAAAElFTkSuQmCC',
			'D61F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7QgMYQximMIaGIIkFTGFtZQhhdEBWF9Aq0siIKdYA1AsTAzspaum0sFXTVoZmIbkvoFW0FUkd3DwHYsRAbkETA7mZMdQRRWygwo+KEIv7AEkgyq2vbVhNAAAAAElFTkSuQmCC',
			'DC19' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QgMYQxmmMEx1QBILmMLa6BDCEBCALNYq0uAYwugggibGMAUuBnZS1NJpq1ZNWxUVhuQ+iDqGqZh6GRrQxRymMKDaAXLLFFS3gNzMGOqA4uaBCj8qQizuAwAcu83XzoAo3AAAAABJRU5ErkJggg==',
			'D42F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QgMYWhlCGUNDkMQCpjBMZXR0dEBWFwBUxdoQiCbG6MqAEAM7KWrp0qWrVmaGZiG5L6BVpJWhlRFNr2iowxR0MaBbAtDEpoB0ooqB3MwaiuqWgQo/KkIs7gMAESjKU+9zj28AAAAASUVORK5CYII=',
			'629E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7WAMYQxhCGUMDkMREprC2Mjo6OiCrC2gRaXRtCEQVa2BAFgM7KTJq1dKVmZGhWUjuC5nCMIUhBE1vK0MAA7p5rYwOjGhiQLc0oLuFNUA01AHNzQMVflSEWNwHAKbJyiBNGjL/AAAAAElFTkSuQmCC',
			'A2DF' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7GB0YQ1hDGUNDkMRYA1hbWRsdHZDViUwRaXRtCEQRC2hlQBYDOylq6aqlS1dFhmYhuQ+obgormt7QUIYAdLGAVkYHTDHWBnS3BLSKhrqGMqKIDVT4URFicR8AgBXK9cuaP7wAAAAASUVORK5CYII=',
			'4781' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpI37poiGOoQytKKIhTA0Ojo6TEUWYwSKuTYEhCKLsU5haGV0dIDpBTtp2rRV01aFrlqK7L6AKQwBSOrAMDSU0YG1IQDV3imsDZhiIg3oekFiDKEMoQGDIfyoB7G4DwBmXsuc2td2TgAAAABJRU5ErkJggg==',
			'C414' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7WEMYWhmmMDQEIImJtDJMZQhhaEQWC2hkCGUEqkURa2B0BeqdEoDkvqhVS5eumrYqKgrJfQEgE6cwOqDqFQ11mMIYGoJqBza3YIiB3MwY6oAiNlDhR0WIxX0Aj8TNcGkY4P0AAAAASUVORK5CYII=',
			'674F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7WANEQx0aHUNDkMREpjA0OrQ6OiCrC2gBik1FE2tgaGUIhIuBnRQZtWrayszM0Cwk94VMYQhgbUTT28rowBoaiCbG2sCApk5kigiGGGsApthAhR8VIRb3AQDiG8rorQRBTwAAAABJRU5ErkJggg==',
			'5426' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAeElEQVR4nGNYhQEaGAYTpIn7QkMYWhlCGaY6IIkFNDBMZXR0CAhAFQtlbQh0EEASCwxgdAWSDsjuC5u2dOmqlZmpWcjuaxVpZWhlRDGPoVU01GEKo4MIsh1AVQwBqGIiU4A6HRhQ9LIGMLSyhgaguHmgwo+KEIv7AMnYyvCXIqnTAAAAAElFTkSuQmCC',
			'DEC8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWklEQVR4nGNYhQEaGAYTpIn7QgNEQxlCHaY6IIkFTBFpYHQICAhAFmsVaWBtEHQQwRBjgKkDOylq6dSwpatWTc1Cch+aOiQxRizmodmBxS3Y3DxQ4UdFiMV9ANCZzXY1Oi16AAAAAElFTkSuQmCC',
			'5EE3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAW0lEQVR4nGNYhQEaGAYTpIn7QkNEQ1lDHUIdkMQCGkQaWBsYHQIwxBiAJEIsMAAiFoDkvrBpU8OWhq5amoXsvlYUdShiyOYFYBETmYLpFtYATDcPVPhREWJxHwAWPsv6Jt/vPAAAAABJRU5ErkJggg==',
			'6C66' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7WAMYQxlCGaY6IImJTGFtdHR0CAhAEgtoEWlwbXB0EEAWaxBpYG1gdEB2X2TUtFVLp65MzUJyX8gUoDpHR1TzWkF6Ax1E0MRc0cSwuQWbmwcq/KgIsbgPALK2zKvn/WxjAAAAAElFTkSuQmCC',
			'294B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WAMYQxgaHUMdkMREprC2MrQ6OgQgiQW0ijQ6THV0EEHWDRILhKuDuGna0qWZmZmhWcjuC2AMdG1ENY/RgaHRNTQQxTzWBpZGh0ZUO0QagG5B0xsaiunmgQo/KkIs7gMAA1XMCE6mdLMAAAAASUVORK5CYII=',
			'BF56' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QgNEQ11DHaY6IIkFTBFpYG1gCAhAFmsFiTE6CKCrm8rogOy+0KipYUszM1OzkNwHUsfQEIhhHlDMQQTDDjQxoF5GRwcUvaEBQBWhDChuHqjwoyLE4j4AWJLNH/SczkEAAAAASUVORK5CYII=',
			'0D2F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7GB1EQxhCGUNDkMRYA0RaGR0dHZDViUwRaXRtCEQRC2gVaXRAiIGdFLV02sqslZmhWUjuA6trZcTUO4URww6HAFQxsFscUMVAbmYNRXXLQIUfFSEW9wEA9t7Jbl6RUtIAAAAASUVORK5CYII=',
			'0ED6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7GB1EQ1lDGaY6IImxBog0sDY6BAQgiYlMAYo1BDoIIIkFtELEkN0XtXRq2NJVkalZSO6DqkMxD6ZXBIsdIgTcgs3NAxV+VIRY3AcAhbPLt4VNklMAAAAASUVORK5CYII=',
			'AAAC' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7GB0YAhimMEwNQBJjDWAMYQhlCBBBEhOZwtrK6OjowIIkFtAq0ujaEOiA7L6opdNWpq6KzEJ2H5o6MAwNFQ11DUUVg6nDtCMAxS1QMRQ3D1T4URFicR8AdlHNNRoCn/oAAAAASUVORK5CYII=',
			'5AAD' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QkMYAhimMIY6IIkFNDCGMIQyOgSgiLG2Mjo6OoggiQUGiDS6NgTCxMBOCps2bWXqqsisacjua0VRBxUTDXUNRRULwKJOZApEDNktrBB7Udw8UOFHRYjFfQCKG8zbADU0vwAAAABJRU5ErkJggg==',
			'8A16' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7WAMYAhimMEx1QBITmcIYwhDCEBCAJBbQytrKGMLoIICiTqTRYQqjA7L7lkZNW5k1bWVqFpL7oOrQzBMNBekVQRGDmCeCYQeqW1gDRBodQx1Q3DxQ4UdFiMV9AMjHzEr09c4MAAAAAElFTkSuQmCC',
			'9246' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAeklEQVR4nGNYhQEaGAYTpIn7WAMYQxgaHaY6IImJTGFtZWh1CAhAEgtoFQGqcnQQQBED6gx0dEB237Spq5auzMxMzUJyH6srwxTWRkcU8xhaGQJYQwMdRJDEBFoZHRgaHVHEgG5pANqCopc1QDTUAc3NAxV+VIRY3AcAZ0vMRmeg0OsAAAAASUVORK5CYII=',
			'BAA2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7QgMYAhimMEx1QBILmMIYwhDKEBCALNbK2sro6OgggqJOpNG1IaBBBMl9oVHTVqauigJChPug6hpR7GgVDXUNDWhlQBEDq5vCgGlHAKqbQWKBoSGDIPyoCLG4DwCu8s9xi5VC+AAAAABJRU5ErkJggg==',
			'580D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZ0lEQVR4nGNYhQEaGAYTpIn7QkMYQximMIY6IIkFNLC2MoQyOgSgiIk0Ojo6OoggiQUGsLayNgTCxMBOCpu2Mmzpqsisacjua0VRBxUTaXRFEwtoxbRDZAqmW1gDMN08UOFHRYjFfQAlVMtBqV1E9AAAAABJRU5ErkJggg==',
			'70BA' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7QkMZAlhDGVpRRFsZQ1gbHaY6oIixtrI2BAQEIItNEWl0bXR0EEF2X9S0lamhK7OmIbmP0QFFHRiyNgDFGgJDQ5DERBpAdgSiqAtoALnFEU0M5GZGFLGBCj8qQizuAwCUm8uoOjcalgAAAABJRU5ErkJggg==',
			'DD5C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QgNEQ1hDHaYGIIkFTBFpZW1gCBBBFmsVaXRtYHRgQRebyuiA7L6opdNWpmZmZiG7D6TOoSHQgQFNLzYxV6AYih1AtzA6OqC4BeRmhlAGFDcPVPhREWJxHwAFfs2lU8LetAAAAABJRU5ErkJggg==',
			'DC88' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWklEQVR4nGNYhQEaGAYTpIn7QgMYQxlCGaY6IIkFTGFtdHR0CAhAFmsVaXBtCHQQQRNjRKgDOylq6bRVq0JXTc1Cch+aOrgYKxbzMOzA4hZsbh6o8KMixOI+AO67zmPskPACAAAAAElFTkSuQmCC',
			'FE06' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWklEQVR4nGNYhQEaGAYTpIn7QkNFQxmmMEx1QBILaBBpYAhlCAhAE2N0dHQQQBNjbQh0QHZfaNTUsKWrIlOzkNwHVYdhHkivCBY70MUw3YLp5oEKPypCLO4DAHwZzIIjSYlsAAAAAElFTkSuQmCC',
			'32FA' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7RAMYQ1hDA1qRxQKmsLayNjBMdUBW2SrS6NrAEBCALDaFASjG6CCC5L6VUauWLg1dmTUN2X1TGKawItRBzWMIAIqFhqCIMTqgqwO6pQFdTDRANNQV3bwBCj8qQizuAwBYzMpx1V++wAAAAABJRU5ErkJggg==',
			'8FDB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAW0lEQVR4nGNYhQEaGAYTpIn7WANEQ11DGUMdkMREpog0sDY6OgQgiQW0AsUaAh1E0NUBxQKQ3Lc0amrY0lWRoVlI7kNTh9M8nHaguYU1ACiG5uaBCj8qQizuAwCcDsyH6RQ35AAAAABJRU5ErkJggg==',
			'C7F2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WENEQ11DA6Y6IImJtDI0ujYwBAQgiQU0gsQYHUSQxRoYWllB6pHcF7Vq1bSloWAa7j6gugCgukYHFL2MDkCxVgYUO1gbgGJTGFDcIgISC0B1M0iMMTRkEIQfFSEW9wEAae/MILHGHBcAAAAASUVORK5CYII=',
			'0E9A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7GB1EQxlCGVqRxVgDRBoYHR2mOiCJiUwRaWBtCAgIQBILaAWJBTqIILkvaunUsJWZkVnTkNwHUscQAleHEGsIDA1Bs4OxAVUdxC2OKGIQNzOiiA1U+FERYnEfACKZymVjpEz8AAAAAElFTkSuQmCC',
			'F319' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QkNZQximMEx1QBILaBBpZQhhCAhAEWNodAxhdBBBFWtlmAIXAzspNGpV2Kppq6LCkNwHUccwFU1vo8MUhgYsYmh2iID0ormFNYQx1AHFzQMVflSEWNwHALKfzMt4BSyLAAAAAElFTkSuQmCC',
			'3B51' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7RANEQ1hDHVqRxQKmiLSyNjBMRVHZKtLo2sAQiiIGUjeVAaYX7KSVUVPDlmZmLUVxH1Ad0NRWdPMcsIi5oomB3MLoiOo+kJuBLgkNGAThR0WIxX0AHVLMNYwcPbsAAAAASUVORK5CYII=',
			'827B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdUlEQVR4nGNYhQEaGAYTpIn7WAMYQ1hDA0MdkMREprC2MjQEOgQgiQW0ijQ6AMVEUNQxNDo0OsLUgZ20NGrV0lVLV4ZmIbkPqA4IGdHMYwhgCGBEMS+gldEBBFHtYG1gbUDVyxogGurawIji5oEKPypCLO4DALt2y4uf6+DzAAAAAElFTkSuQmCC',
			'69E7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZ0lEQVR4nGNYhQEaGAYTpIn7WAMYQ1hDHUNDkMREprC2soJoJLGAFpFGV3SxBohYAJL7IqOWLk0NXbUyC8l9IVMYA4HqWpHtDWhlAOmdgirGAhILQBaDuIXRAYubUcQGKvyoCLG4DwALCcvThLenPAAAAABJRU5ErkJggg==',
			'3AAD' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7RAMYAhimMIY6IIkFTGEMYQhldAhAVtnK2sro6Ogggiw2RaTRtSEQJgZ20sqoaStTV0VmTUN2H6o6qHmioa6h6GKY6gKgepHdIhoAFkNx80CFHxUhFvcBAOAUzHUbh5RjAAAAAElFTkSuQmCC',
			'D09C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYUlEQVR4nGNYhQEaGAYTpIn7QgMYAhhCGaYGIIkFTGEMYXR0CBBBFmtlbWVtCHRgQRETaXQFiiG7L2rptJWZmZFZyO4DqXMIgatDiDWgi7G2MqLbgcUt2Nw8UOFHRYjFfQBnwMxcf+LNJQAAAABJRU5ErkJggg==',
			'2B18' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7WANEQximMEx1QBITmSLSyhDCEBCAJBbQKtLoGMLoIIKsuxWobgpcHcRN06aGrZq2amoWsvsCUNSBIdCkRocpqOaxNmCKiTRg6g0NFQ1hDHVAcfNAhR8VIRb3AQBcfMufTp78ZAAAAABJRU5ErkJggg==',
			'989C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7WAMYQxhCGaYGIImJTGFtZXR0CBBBEgtoFWl0bQh0YEERY21lBYohu2/a1JVhKzMjs5Ddx+rK2soQAlcHgUDzHBpQxQSAYo5odmBzCzY3D1T4URFicR8Af5HKydk6QjsAAAAASUVORK5CYII=',
			'8149' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7WAMYAhgaHaY6IImJTGEMYGh1CAhAEgtoBaqc6ugggqIOqDcQLgZ20tKoVVErM7OiwpDcB1LHCrRDBMU8oFhoQAO6GNAtmHY0orqFFagT3c0DFX5UhFjcBwB6NMrn3WZxBgAAAABJRU5ErkJggg==',
			'6DA3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WANEQximMIQ6IImJTBFpZQhldAhAEgtoEWl0dHRoEEEWaxBpdAWSAUjui4yatjJ1VdTSLCT3hUxBUQfR2woUCw1ANa8Vok4EzS2sDYEobgG5mbUhAMXNAxV+VIRY3AcAVtTO+C1QPYEAAAAASUVORK5CYII=',
			'9046' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7WAMYAhgaHaY6IImJTGEMYWh1CAhAEgtoZW1lmOroIIAiJtLoEOjogOy+aVOnrczMzEzNQnIfq6tIo2ujI4p5DEC9rqGBDiJIYgIgOxodUcTAbmlEdQs2Nw9U+FERYnEfAAkCzAo5WJTHAAAAAElFTkSuQmCC',
			'4EDD' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpI37poiGsoYyhjogi4WINLA2OjoEIIkxgsQaAh1EkMRYp6CIgZ00bdrUsKWrIrOmIbkvYAqm3tBQTDEGLOrAYmhuwermgQo/6kEs7gMAEWfLauPzvswAAAAASUVORK5CYII=',
			'2A4A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7WAMYAhgaHVqRxUSmMIYwtDpMdUASC2hlbWWY6hAQgKy7VaTRIdDRQQTZfdOmrczMzMyahuy+AJFG10a4OjBkdBANdQ0NDA1BdksD0Dw0dSJYxEJDMcUGKvyoCLG4DwCR88yewAbWaAAAAABJRU5ErkJggg==',
			'778D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QkNFQx1CGUMdkEVbGRodHR0dAtDEXBsCHUSQxaYwtDIC1Ykguy9q1bRVoSuzpiG5j9GBIQBJHRiyAkVZ0cwTAYqiiwUARRnR3AISY0B38wCFHxUhFvcBACo/ypCnKOd5AAAAAElFTkSuQmCC',
			'1487' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7GB0YWhlCGUNDkMRYHRimMjo6NIggiYk6MISyNgSgiDE6MLqC1AUguW9l1tKlq0KBFJL7GB1EWoHqWlHtFQ11bQiYgu4WoB0B6GKMjo4OyGKiIWA3o4gNVPhREWJxHwBZGsgyujU7ygAAAABJRU5ErkJggg==',
			'2794' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nM2Quw2AMAwFXwo2gH2cgt5IcZMN2MIpsgFiBzIlLs2nBIFPcnGSpZPRLqP4E6/0dTwICZSd6xeUGKl4xxVltO0dKmqnvLDvW9u6zTln38dGmsjfBgoEnST5FiNYyaHFCJEOTqRXnJq/+t+D3PTtip3NJ4CpZhkAAAAASUVORK5CYII=',
			'3967' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7RAMYQxhCGUNDkMQCprC2Mjo6NIggq2wVaXRtQBObAhIDqkdy38qopUtTp65amYXsvimMga6ODq0oNrcyAPUGTEEVYwGJBTBguMXRAYubUcQGKvyoCLG4DwD+LsvNaxIUwgAAAABJRU5ErkJggg==',
			'E0C8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXUlEQVR4nGNYhQEaGAYTpIn7QkMYAhhCHaY6IIkFNDCGMDoEBASgiLG2sjYIOoigiIk0ujYwwNSBnRQaNW1l6qpVU7OQ3IemDkmMEc08bHZgugWbmwcq/KgIsbgPADNtzP650SFwAAAAAElFTkSuQmCC',
			'8B28' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7WANEQxhCGaY6IImJTBFpZXR0CAhAEgtoFWl0bQh0EEFTB5SBqQM7aWnU1LBVK7OmZiG5D6yulQHDPIcpjCjmgcUCGDHsYHRA1QtyM2toAIqbByr8qAixuA8AggvMaJxi5u8AAAAASUVORK5CYII=',
			'FDBF' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAU0lEQVR4nGNYhQEaGAYTpIn7QkNFQ1hDGUNDkMQCGkRaWRsdHRhQxRpdGwIxxRDqwE4KjZq2MjV0ZWgWkvvQ1OE3D1MMi1vAbkYRG6jwoyLE4j4A4ufMr6IL1xcAAAAASUVORK5CYII=',
			'3B36' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAW0lEQVR4nGNYhQEaGAYTpIn7RANEQxhDGaY6IIkFTBFpZW10CAhAVtkq0ujQEOgggCwGVMfQ6OiA7L6VUVPDVk1dmZqF7D6IOqzmiRAQw+YWbG4eqPCjIsTiPgD3NczfGh/OnwAAAABJRU5ErkJggg==',
			'7839' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QkMZQxhDGaY6IIu2srayNjoEBKCIiTQ6NAQ6iCCLTWFtZWh0hIlB3BS1MmzV1FVRYUjuY3QAqXOYiqyXtQFkXkADspgIRAzFjoAGTLcENGBx8wCFHxUhFvcBALNLzMkKP8oLAAAAAElFTkSuQmCC',
			'C909' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7WEMYQximMEx1QBITaWVtZQhlCAhAEgtoFGl0dHR0EEEWaxBpdG0IhImBnRS1aunS1FVRUWFI7gtoYAx0bQiYiqqXAagXaAKKHSxAOxxQ7MDmFmxuHqjwoyLE4j4AsRrMol4crLMAAAAASUVORK5CYII=',
			'605A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nGNYhQEaGAYTpIn7WAMYAlhDHVqRxUSmMIawNjBMdUASC2hhbQWKBQQgizWINLpOZXQQQXJfZNS0lamZmVnTkNwXMkWk0aEhEKYOorcVLBYagiIGsgNVHcgtjI6OKGIgNzOEMqKIDVT4URFicR8AT8rLWA3JReEAAAAASUVORK5CYII=',
			'8B49' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7WANEQxgaHaY6IImJTBFpZWh1CAhAEgtoFQGqcnQQQVcXCBcDO2lp1NSwlZlZUWFI7gOpYwXqFkEzzzU0oAFdzKHRAdOORlS3YHPzQIUfFSEW9wEA31vNo1vaUXYAAAAASUVORK5CYII=',
			'D0DB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAW0lEQVR4nGNYhQEaGAYTpIn7QgMYAlhDGUMdkMQCpjCGsDY6OgQgi7WytrI2BDqIoIiJNLoCxQKQ3Be1dNrK1FWRoVlI7kNThyImQsgOLG7B5uaBCj8qQizuAwD5+c2gnG7cfAAAAABJRU5ErkJggg==',
			'E903' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7QkMYQximMIQ6IIkFNLC2MoQyOgSgiIk0Ojo6NIigibkCyQAk94VGLV2auipqaRaS+wIaGAOR1EHFGMB6Uc1jwWIHpluwuXmgwo+KEIv7AL2UzjuuX7ygAAAAAElFTkSuQmCC',
			'E429' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7QkMYWhlCGaY6IIkFNDBMZXR0CAhAFQtlbQh0EEERY3RlQIiBnRQatXTpqpVZUWFI7gtoEGkF2jIVVa9oqMMUhgZUMaCqAAYHdDFGBwYUt4DczBoagOLmgQo/KkIs7gMAJrHML7dd5bgAAAAASUVORK5CYII=',
			'1EEF' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAATklEQVR4nGNYhQEaGAYTpIn7GB1EQ1lDHUNDkMRYHUQaWIEyyOpEsYgxooqBnbQya2rY0tCVoVlI7mMkrJckMdEQsJtRxAYq/KgIsbgPABNGxZ3LSaNyAAAAAElFTkSuQmCC',
			'DCB0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7QgMYQ1lDGVqRxQKmsDa6NjpMdUAWaxVpcG0ICAhAE2NtdHQQQXJf1NJpq5aGrsyahuQ+NHUIsYZADDEMO7C4BZubByr8qAixuA8ABPDPQnNYl6UAAAAASUVORK5CYII=',
			'96FD' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7WAMYQ1hDA0MdkMREprC2sjYwOgQgiQW0ijSCxERQxRqQxMBOmjZ1WtjS0JVZ05Dcx+oq2oqulwFoniuamAAWMWxuAbu5gRHFzQMVflSEWNwHAIfUygHwdmH1AAAAAElFTkSuQmCC',
			'7B96' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QkNFQxhCGaY6IIu2irQyOjoEBKCKNbo2BDoIIItNEWllBYqhuC9qatjKzMjULCT3MTqItDKEBKKYx9og0ugA1CuCJCYCFHNEEwtowHRLQAMWNw9Q+FERYnEfAIJwy89vtwpwAAAAAElFTkSuQmCC',
			'15FB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7GB1EQ1lDA0MdkMRYHUQaWIEyAUhiolAxERS9IiFI6sBOWpk1denS0JWhWUjuY3RgaHRFMw8mhmYeFjHWVgy3hDCC7EVx80CFHxUhFvcBANlgx/TkOMx6AAAAAElFTkSuQmCC',
			'C9AE' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7WEMYQximMIYGIImJtLK2MoQyOiCrC2gUaXR0dEQVaxBpdG0IhImBnRS1aunS1FWRoVlI7gtoYAxEUgcVY2h0DUUTa2RpRFcHcgsrmhjIzUAxFDcPVPhREWJxHwAbaMuHmYFQvwAAAABJRU5ErkJggg==',
			'BFF6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWUlEQVR4nGNYhQEaGAYTpIn7QgNEQ11DA6Y6IIkFTBFpYG1gCAhAFmsFiTE6CGCoY3RAdl9o1NSwpaErU7OQ3AdVh9U8EUJiWNwSGgAWQ3HzQIUfFSEW9wEAuYrMkxspdW0AAAAASUVORK5CYII=',
			'D501' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7QgNEQxmmMLQiiwVMEWlgCGWYiiLWKtLA6OgQiiYWwgokkd0XtXTq0qVAEtl9QBWNrgh1eMREGh0dHdDcwtoKdAuKWGgAYwjQzaEBgyD8qAixuA8AOzXN6SAhbFIAAAAASUVORK5CYII=',
			'DCC4' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7QgMYQxlCHRoCkMQCprA2OjoENKKItYo0uDYItKKLsTYwTAlAcl/U0mmrlgKpKCT3QdQxOmDqZQwNwbQDm1tQxLC5eaDCj4oQi/sAFeHQGLpuvCwAAAAASUVORK5CYII=',
			'B46C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7QgMYWhlCGaYGIIkFTGGYyujoECCCLAZUxdrg6MCCoo7RlbWB0QHZfaFRS5cunboyC9l9AVNEWlkdHR0YUMwTDXVtCEQTY2hlBYqh2sHQiu4WbG4eqPCjIsTiPgAJiswij5TdQwAAAABJRU5ErkJggg==',
			'4935' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpI37pjCGMIYyhgYgi4WwtrI2Ojogq2MMEWl0aAhEEWOdAhRrdHR1QHLftGlLl2ZNXRkVheS+gCmMgQ5A3SJIekNDGYAiAShiDFNYwHagioHc4hCA4j6wmxmmOgyG8KMexOI+AEbSzIdn2yphAAAAAElFTkSuQmCC',
			'1E1A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7GB1EQxmmMLQii7E6iDQwhDBMdUASEwWKMYYwBASg6AWqmwIm4e5bmTU1bNW0lVnTkNyHpg5ZLDQEt3k4xURDREMZQx1RxAYq/KgIsbgPAIgtx5+tkVkJAAAAAElFTkSuQmCC',
			'A978' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAd0lEQVR4nGNYhQEaGAYTpIn7GB0YQ1hDA6Y6IImxBrC2MjQEBAQgiYlMEWl0aAh0EEESC2gFijU6wNSBnRS1dOnSrKWrpmYhuS+glTHQYQoDinmhoQxAnYxo5rE0Ojqgi7G2sjag6gWaFwIUQ3HzQIUfFSEW9wEAffvNQKOO0zAAAAAASUVORK5CYII=',
			'965A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdUlEQVR4nGNYhQEaGAYTpIn7WAMYQ1hDHVqRxUSmsLayNjBMdUASC2gVaQSKBQSgijWwTmV0EEFy37Sp08KWZmZmTUNyH6urKND8QJg6CASa59AQGBqCJCYAFHNFUwdyC6OjI4oYyM0MoYyo5g1Q+FERYnEfAMojyuOBhJu6AAAAAElFTkSuQmCC',
			'3B08' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYUlEQVR4nGNYhQEaGAYTpIn7RANEQximMEx1QBILmCLSyhDKEBCArLJVpNHR0dFBBFkMqI61IQCmDuyklVFTw5auipqahew+VHVw81wbAlHNw2IHNrdgc/NAhR8VIRb3AQBg5MxdShDgOgAAAABJRU5ErkJggg==',
			'0D49' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7GB1EQxgaHaY6IImxBoi0MrQ6BAQgiYlMEQGqcnQQQRILaAWKBcLFwE6KWjptZWZmVlQYkvtA6lyButH1uoYGNIig29HogGIH2C2NqG7B5uaBCj8qQizuAwCTSc1hisfs/wAAAABJRU5ErkJggg==',
			'C10D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7WEMYAhimMIY6IImJtDIGMIQyOgQgiQU0sgYwOjo6iCCLNTAEsDYEwsTATooCoqWrIrOmIbkPTR1usUYGDDtEWhkw3MIawhqK7uaBCj8qQizuAwBTXMkdqo4WhAAAAABJRU5ErkJggg==',
			'470F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpI37poiGOkxhDA1BFgthaHQIZXRAVscIFHN0dEQRY53C0MraEAgTAztp2rRV05auigzNQnJfwBSGACR1YBgKNB9djGEKawMjmh0MU0QaGNDcAhabgiY2UOFHPYjFfQClYsk0CNo3pgAAAABJRU5ErkJggg==',
			'B5EC' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7QgNEQ1lDHaYGIIkFTBFpYG1gCBBBFmsFiTE6sKCqCwGJIbsvNGrq0qWhK7OQ3RcwhaHRFaEOah42MRGwGKodrK3obgkNYAxBd/NAhR8VIRb3AQAhJ8wq7XErxQAAAABJRU5ErkJggg==',
			'F03A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkMZAhhDGVqRxQIaGENYGx2mOqCIsQLVBAQEoIiJNDo0OjqIILkvNGrayqypK7OmIbkPTR1CrCEwNATDjkA0dSC3oOsFuZkRRWygwo+KEIv7AM8NzV9xvF3gAAAAAElFTkSuQmCC',
			'CC00' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7WEMYQxmmMLQii4m0sjY6hDJMdUASC2gUaXB0dAgIQBZrEGlgbQh0EEFyX9SqaauWrorMmobkPjR1uMWw2IHNLdjcPFDhR0WIxX0ARhLNEY2dDAAAAAAASUVORK5CYII=',
			'014B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7GB0YAhgaHUMdkMRYAxgDGFodHQKQxESmsAYwTHV0EEESC2gF6g2EqwM7KWrpqqiVmZmhWUjuA6ljbUQ1DywWGohinsgUsFtQxIC2gsWQ9TI6sIaiu3mgwo+KEIv7ALhlyXFEyQcdAAAAAElFTkSuQmCC',
			'E546' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7QkNEQxkaHaY6IIkFNIg0MLQ6BASgi011dBBAFQthCHR0QHZfaNTUpSszM1OzkNwHNKfRtdERzTygWGiggwiqeY0OjY5oYqytQPeh6A0NYQxBd/NAhR8VIRb3AQB03M4WheBDtwAAAABJRU5ErkJggg==',
			'9D44' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7WANEQxgaHRoCkMREpoi0MrQ6NCKLBbSKNDpMdWjFEAt0mBKA5L5pU6etzMzMiopCch+rq0ija6OjA7JeBqBe19DA0BAkMQGQedjcgiaGzc0DFX5UhFjcBwBeus9+jDjXMgAAAABJRU5ErkJggg==',
			'3A46' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAc0lEQVR4nGNYhQEaGAYTpIn7RAMYAhgaHaY6IIkFTGEMYWh1CAhAVtnK2sow1dFBAFlsikijQ6CjA7L7VkZNW5mZmZmahew+oDrXRkc080RDXUMDHURQxIDmNTqiiAWA7GhEdYtoAFgMxc0DFX5UhFjcBwAjfs1IYO+NbgAAAABJRU5ErkJggg==',
			'BAA7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QgMYAhimMIaGIIkFTGEMYQhlaBBBFmtlbWV0dEAVmyLS6NoQAIQI94VGTVuZuipqZRaS+6DqWhlQzBMNdQ0NmIIqBlYXwIBhR6ADqpsxxQYq/KgIsbgPAC4NzttP5/C2AAAAAElFTkSuQmCC',
			'71B2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7QkMZAlhDGaY6IIu2MgawNjoEBKCIsQawNgQ6iCCLTWEAqWsQQXZf1KqopaEgCuE+RgewukZkO1gbgGINAa3IbhGBiE1BFgtoAOsNQBVjDWUNZQwNGQThR0WIxX0AH97KmjKnv8sAAAAASUVORK5CYII=',
			'0932' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7GB0YQxhDGaY6IImxBrC2sjY6BAQgiYlMEWl0aAh0EEESC2gFigFFRZDcF7V06dKsqUAayX0BrYyBDmCVyHoZgHwgiWIHC0hsCgMWt2C6mTE0ZBCEHxUhFvcBAGNTzRgKZix5AAAAAElFTkSuQmCC',
			'DC48' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QgMYQxkaHaY6IIkFTGFtdGh1CAhAFmsVaXCY6ugggibGEAhXB3ZS1NJpq1ZmZk3NQnIfSB3QRAzzWEMDMcxzaESzA+QWNL3Y3DxQ4UdFiMV9AIYQz6Q4W4jnAAAAAElFTkSuQmCC',
			'00EE' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAVUlEQVR4nGNYhQEaGAYTpIn7GB0YAlhDHUMDkMRYAxhDWEEySGIiU1hb0cUCWkUaXRFiYCdFLZ22MjV0ZWgWkvvQ1OEUw2YHNrdgc/NAhR8VIRb3AQB4tshtabj97gAAAABJRU5ErkJggg=='        
        );
        $this->text = array_rand( $images );
        return $images[ $this->text ] ;    
    }
    
    function out_processing_gif(){
        $image = dirname(__FILE__) . '/processing.gif';
        $base64_image = "R0lGODlhFAAUALMIAPh2AP+TMsZiALlcAKNOAOp4ANVqAP+PFv///wAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFCgAIACwAAAAAFAAUAAAEUxDJSau9iBDMtebTMEjehgTBJYqkiaLWOlZvGs8WDO6UIPCHw8TnAwWDEuKPcxQml0Ynj2cwYACAS7VqwWItWyuiUJB4s2AxmWxGg9bl6YQtl0cAACH5BAUKAAgALAEAAQASABIAAAROEMkpx6A4W5upENUmEQT2feFIltMJYivbvhnZ3Z1h4FMQIDodz+cL7nDEn5CH8DGZhcLtcMBEoxkqlXKVIgAAibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkphaA4W5upMdUmDQP2feFIltMJYivbvhnZ3V1R4BNBIDodz+cL7nDEn5CH8DGZAMAtEMBEoxkqlXKVIg4HibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpjaE4W5tpKdUmCQL2feFIltMJYivbvhnZ3R0A4NMwIDodz+cL7nDEn5CH8DGZh8ONQMBEoxkqlXKVIgIBibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpS6E4W5spANUmGQb2feFIltMJYivbvhnZ3d1x4JMgIDodz+cL7nDEn5CH8DGZgcBtMMBEoxkqlXKVIggEibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpAaA4W5vpOdUmFQX2feFIltMJYivbvhnZ3V0Q4JNhIDodz+cL7nDEn5CH8DGZBMJNIMBEoxkqlXKVIgYDibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpz6E4W5tpCNUmAQD2feFIltMJYivbvhnZ3R1B4FNRIDodz+cL7nDEn5CH8DGZg8HNYMBEoxkqlXKVIgQCibbK9YLBYvLtHH5K0J0IACH5BAkKAAgALAEAAQASABIAAAROEMkpQ6A4W5spIdUmHQf2feFIltMJYivbvhnZ3d0w4BMAIDodz+cL7nDEn5CH8DGZAsGtUMBEoxkqlXKVIgwGibbK9YLBYvLtHH5K0J0IADs=";
        $binary = is_file($image) ? join("",file($image)) : base64_decode($base64_image); 
        header("Cache-Control: post-check=0, pre-check=0, max-age=0, no-store, no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: image/gif");
        echo $binary;
    }

}
# end of class phpfmgImage
# ------------------------------------------------------
# end of module : captcha


# module user
# ------------------------------------------------------
function phpfmg_user_isLogin(){
    return ( isset($_SESSION['authenticated']) && true === $_SESSION['authenticated'] );
}


function phpfmg_user_logout(){
    session_destroy();
    header("Location: admin.php");
}

function phpfmg_user_login()
{
    if( phpfmg_user_isLogin() ){
        return true ;
    };
    
    $sErr = "" ;
    if( 'Y' == $_POST['formmail_submit'] ){
        if(
            defined( 'PHPFMG_USER' ) && strtolower(PHPFMG_USER) == strtolower($_POST['Username']) &&
            defined( 'PHPFMG_PW' )   && strtolower(PHPFMG_PW) == strtolower($_POST['Password']) 
        ){
             $_SESSION['authenticated'] = true ;
             return true ;
             
        }else{
            $sErr = 'Login failed. Please try again.';
        }
    };
    
    // show login form 
    phpfmg_admin_header();
?>
<form name="frmFormMail" action="" method='post' enctype='multipart/form-data'>
<input type='hidden' name='formmail_submit' value='Y'>
<br><br><br>

<center>
<div style="width:380px;height:260px;">
<fieldset style="padding:18px;" >
<table cellspacing='3' cellpadding='3' border='0' >
	<tr>
		<td class="form_field" valign='top' align='right'>Email :</td>
		<td class="form_text">
            <input type="text" name="Username"  value="<?php echo $_POST['Username']; ?>" class='text_box' >
		</td>
	</tr>

	<tr>
		<td class="form_field" valign='top' align='right'>Password :</td>
		<td class="form_text">
            <input type="password" name="Password"  value="" class='text_box'>
		</td>
	</tr>

	<tr><td colspan=3 align='center'>
        <input type='submit' value='Login'><br><br>
        <?php if( $sErr ) echo "<span style='color:red;font-weight:bold;'>{$sErr}</span><br><br>\n"; ?>
        <a href="admin.php?mod=mail&func=request_password">I forgot my password</a>   
    </td></tr>
</table>
</fieldset>
</div>
<script type="text/javascript">
    document.frmFormMail.Username.focus();
</script>
</form>
<?php
    phpfmg_admin_footer();
}


function phpfmg_mail_request_password(){
    $sErr = '';
    if( $_POST['formmail_submit'] == 'Y' ){
        if( strtoupper(trim($_POST['Username'])) == strtoupper(trim(PHPFMG_USER)) ){
            phpfmg_mail_password();
            exit;
        }else{
            $sErr = "Failed to verify your email.";
        };
    };
    
    $n1 = strpos(PHPFMG_USER,'@');
    $n2 = strrpos(PHPFMG_USER,'.');
    $email = substr(PHPFMG_USER,0,1) . str_repeat('*',$n1-1) . 
            '@' . substr(PHPFMG_USER,$n1+1,1) . str_repeat('*',$n2-$n1-2) . 
            '.' . substr(PHPFMG_USER,$n2+1,1) . str_repeat('*',strlen(PHPFMG_USER)-$n2-2) ;


    phpfmg_admin_header("Request Password of Email Form Admin Panel");
?>
<form name="frmRequestPassword" action="admin.php?mod=mail&func=request_password" method='post' enctype='multipart/form-data'>
<input type='hidden' name='formmail_submit' value='Y'>
<br><br><br>

<center>
<div style="width:580px;height:260px;text-align:left;">
<fieldset style="padding:18px;" >
<legend>Request Password</legend>
Enter Email Address <b><?php echo strtoupper($email) ;?></b>:<br />
<input type="text" name="Username"  value="<?php echo $_POST['Username']; ?>" style="width:380px;">
<input type='submit' value='Verify'><br>
The password will be sent to this email address. 
<?php if( $sErr ) echo "<br /><br /><span style='color:red;font-weight:bold;'>{$sErr}</span><br><br>\n"; ?>
</fieldset>
</div>
<script type="text/javascript">
    document.frmRequestPassword.Username.focus();
</script>
</form>
<?php
    phpfmg_admin_footer();    
}


function phpfmg_mail_password(){
    phpfmg_admin_header();
    if( defined( 'PHPFMG_USER' ) && defined( 'PHPFMG_PW' ) ){
        $body = "Here is the password for your form admin panel:\n\nUsername: " . PHPFMG_USER . "\nPassword: " . PHPFMG_PW . "\n\n" ;
        if( 'html' == PHPFMG_MAIL_TYPE )
            $body = nl2br($body);
        mailAttachments( PHPFMG_USER, "Password for Your Form Admin Panel", $body, PHPFMG_USER, 'You', "You <" . PHPFMG_USER . ">" );
        echo "<center>Your password has been sent.<br><br><a href='admin.php'>Click here to login again</a></center>";
    };   
    phpfmg_admin_footer();
}


function phpfmg_writable_check(){
 
    if( is_writable( dirname(PHPFMG_SAVE_FILE) ) && is_writable( dirname(PHPFMG_EMAILS_LOGFILE) )  ){
        return ;
    };
?>
<style type="text/css">
    .fmg_warning{
        background-color: #F4F6E5;
        border: 1px dashed #ff0000;
        padding: 16px;
        color : black;
        margin: 10px;
        line-height: 180%;
        width:80%;
    }
    
    .fmg_warning_title{
        font-weight: bold;
    }

</style>
<br><br>
<div class="fmg_warning">
    <div class="fmg_warning_title">Your form data or email traffic log is NOT saving.</div>
    The form data (<?php echo PHPFMG_SAVE_FILE ?>) and email traffic log (<?php echo PHPFMG_EMAILS_LOGFILE?>) will be created automatically when the form is submitted. 
    However, the script doesn't have writable permission to create those files. In order to save your valuable information, please set the directory to writable.
     If you don't know how to do it, please ask for help from your web Administrator or Technical Support of your hosting company.   
</div>
<br><br>
<?php
}


function phpfmg_log_view(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );
    
    phpfmg_admin_header();
   
    $file = $files[$n];
    if( is_file($file) ){
        if( 1== $n ){
            echo "<pre>\n";
            echo join("",file($file) );
            echo "</pre>\n";
        }else{
            $man = new phpfmgDataManager();
            $man->displayRecords();
        };
     

    }else{
        echo "<b>No form data found.</b>";
    };
    phpfmg_admin_footer();
}


function phpfmg_log_download(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );

    $file = $files[$n];
    if( is_file($file) ){
        phpfmg_util_download( $file, PHPFMG_SAVE_FILE == $file ? 'form-data.csv' : 'email-traffics.txt', true, 1 ); // skip the first line
    }else{
        phpfmg_admin_header();
        echo "<b>No email traffic log found.</b>";
        phpfmg_admin_footer();
    };

}


function phpfmg_log_delete(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );
    phpfmg_admin_header();

    $file = $files[$n];
    if( is_file($file) ){
        echo unlink($file) ? "It has been deleted!" : "Failed to delete!" ;
    };
    phpfmg_admin_footer();
}


function phpfmg_util_download($file, $filename='', $toCSV = false, $skipN = 0 ){
    if (!is_file($file)) return false ;

    set_time_limit(0);


    $buffer = "";
    $i = 0 ;
    $fp = @fopen($file, 'rb');
    while( !feof($fp)) { 
        $i ++ ;
        $line = fgets($fp);
        if($i > $skipN){ // skip lines
            if( $toCSV ){ 
              $line = str_replace( chr(0x09), ',', $line );
              $buffer .= phpfmg_data2record( $line, false );
            }else{
                $buffer .= $line;
            };
        }; 
    }; 
    fclose ($fp);
  

    
    /*
        If the Content-Length is NOT THE SAME SIZE as the real conent output, Windows+IIS might be hung!!
    */
    $len = strlen($buffer);
    $filename = basename( '' == $filename ? $file : $filename );
    $file_extension = strtolower(substr(strrchr($filename,"."),1));

    switch( $file_extension ) {
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
        case "mp3": $ctype="audio/mpeg"; break;
        case "wav": $ctype="audio/x-wav"; break;
        case "mpeg":
        case "mpg":
        case "mpe": $ctype="video/mpeg"; break;
        case "mov": $ctype="video/quicktime"; break;
        case "avi": $ctype="video/x-msvideo"; break;
        //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
        case "php":
        case "htm":
        case "html": 
                $ctype="text/plain"; break;
        default: 
            $ctype="application/x-download";
    }
                                            

    //Begin writing headers
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer");
    //Use the switch-generated Content-Type
    header("Content-Type: $ctype");
    //Force the download
    header("Content-Disposition: attachment; filename=".$filename.";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    
    while (@ob_end_clean()); // no output buffering !
    flush();
    echo $buffer ;
    
    return true;
 
    
}
?>