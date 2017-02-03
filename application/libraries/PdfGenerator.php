<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Chris Harvey
 * @license         MIT License
 * @link            https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
 */

    require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class PdfGenerator
{

use Dompdf\Dompdf;

  public function generate($html,$filename)
  {

    define('DOMPDF_ENABLE_AUTOLOAD', false);

    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}