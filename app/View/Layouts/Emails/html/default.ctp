<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="initial-scale=1.0">    <!-- So that mobile webkit will display zoomed in -->
                <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->

                <title><?php echo $title_for_layout; ?></title>

                <style type="text/css">

                        /* Resets: see reset.css for details */
                        .ReadMsgBody { width: 100%; background-color: #ebebeb;}
                        .ExternalClass {width: 100%; background-color: #ebebeb;}
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}
                        body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}
                        body {margin:0; padding:0;}
                        table {border-spacing:0;}
                        table td {border-collapse:collapse;}
                        .yshortcuts a {border-bottom: none !important;}


                        /* Constrain email width for small screens */
                        @media screen and (max-width: 600px) {
                                table[class="container"] {
                                        width: 95% !important;
                                }
                        }

                        /* Give content more room on mobile */
                        @media screen and (max-width: 480px) {
                                td[class="container-padding"] {
                                        padding-left: 12px !important;
                                        padding-right: 12px !important;
                                }
                        }


                        /* Styles for forcing columns to rows */
                        @media only screen and (max-width : 600px) {

                                /* force container columns to (horizontal) blocks */
                                td[class="force-col"] {
                                        display: block;
                                        padding-right: 0 !important;
                                }
                                table[class="col-2"] {
                                        /* unset table align="left/right" */
                                        float: none !important;
                                        width: 100% !important;

                                        /* change left/right padding and margins to top/bottom ones */
                                        margin-bottom: 12px;
                                        padding-bottom: 12px;
                                        border-bottom: 1px solid #eee;
                                }

                                /* remove bottom border for last column/row */
                                table[id="last-col-2"] {
                                        border-bottom: none !important;
                                        margin-bottom: 0;
                                }

                                /* align images right and shrink them a bit */
                                img[class="col-2-img"] {
                                        float: right;
                                        margin-left: 6px;
                                        max-width: 130px;
                                }
                        }


                </style>

        </head>
        <body style="margin:0; padding:10px 0;" bgcolor="#ebebeb" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

                <br>

                <!-- 100% wrapper (grey background) -->
                <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ebebeb">
                        <tr>
                                <td align="center" valign="top" bgcolor="#ebebeb" style="background-color: #ebebeb;">

                                        <!-- 600px container (white background) -->
                                        <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" bgcolor="#ffffff">
                                                <tr>
                                                        <td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 14px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;">
                                                                <br>

                                                                

                                                                <div style="font-weight: bold; font-size: 18px; line-height: 24px; color: #D03C0F;">
                                                                        Question Me
                                                                </div>
                                                                <br>
                                                                <?php echo $this->fetch('content'); ?>
                                                                

                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="container-padding" bgcolor="#ffffff" style="background-color: #ffffff; padding-left: 30px; padding-right: 30px; font-size: 13px; line-height: 20px; font-family: Helvetica, sans-serif; color: #333;" align="left">
                                                                <br>

                                                                <div style="font-weight: bold; font-size: 18px; line-height: 24px; color: #D03C0F; border-top: 1px solid #ddd;"><br>Demo: Two columns to rows</div>
                                                                <br>

                                                                <strong>Adjustments to consider</strong><br><br>
                                                                - Adjust column widths: 175px to 260px<br>
                                                                - Added new &lt;br&gt; before headline (which makes extra gap on mobile. Consider adding table wrapper to image).<br>
                                                                - Adjusted class names for consistency.

                                                                <br><br>

                                                                <em>This is a quick demo! (28 Okt)</em>

                                                                <br><br>


                                                        </td>
                                                </tr>
                                        </table>
                                        <!--/600px container -->

                                </td>
                        </tr>
                </table>
                <!--/100% wrapper-->
                <br>
                <br>
        </body>
</html>