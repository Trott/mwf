<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Mobile Resources")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu-full menu-padded menu-detailed"> 
<h1 class="menu-first">Mobile Resources</h1> 
 
<ol class="options"> 
    <li><a href="http://m.ebscohost.com"><strong>Academic Search Complete</strong><br /><span class="smallprint">A multidisciplinary database providing full text access to scholarly and general interest journals, books, and reports. (UC Only)</span></a></li> 
    <li><a href="http://m.accessmedicine.com/"><strong>AccessMedicine</strong><br /><span class="smallprint">Full-text of Lange's basic sciences and clinical sciences series.<br /> 
Requires personal profile name and password. Visit www.accessmedicine.com using a non-mobile browser. Select "My AccessMedicine" tab.  (UCSF Only)</span></a></li> 
    <li><a href="http://m.ebscohost.com"><strong>Business Source Complete</strong><br /><span class="smallprint">Business, management, finance and economics. (UC Only)</span></a></li> 
    <li><a href="http://m.ebscohost.com"><strong>CINAHL Plus with Full Text</strong><br /><span class="smallprint">Nursing and allied health literature. (UCSF Only)</span></a></li> 
    <li><a href="http://dailymed.nlm.nih.gov/dailymed/mobile/index.cfm"><strong>DailyMed</strong><br /> 
    <span class="smallprint">Medication content and labeling information. (Public)</span></a></li> 
    <li><a href="http://m.medlineplus.gov/"><strong>MedlinePlus</strong><br /><span class="smallprint">Consumer health information. (Public)</span></a></li> 
    <li><a href="http://www.thomsonhc.com/micromedex2/librarian" target="_blank"><strong>MICROMEDEX</strong><br /> 
<span class="smallprint">Full text drug information databases. (UCSF Only)</span></a></li> 
    <li><a href="http://m.proceduresconsult.com/" target="_blank"><strong>ProceduresConsult</strong><br /> 
   <span class="smallprint">Multimedia and textual demonstrations of medical procedures. 
   Register at http://proceduresconsult.com/UCSF. Click on Sign-in in upper right, then click on Self-Registration. (UCSF Only).</span></a></li> 
<li><a href="http://pubget.com/mobile" target="_blank"><strong>PubGet</strong><br /> 
        <span class="smallprint">Find an article, get the full text quickly. (UCSF Only)</span></a></li> 
  <li><a href="http://www.ncbi.nlm.nih.gov/m/pubmed/"><strong>PubMed@UCSF</strong><br /><span class="smallprint">Public access to MEDLINE. Also includes the subject areas of nursing, dentistry, bioethics, complementary and alternative medicine, and history of medicine. (Public)</span></a></li> 
    <li><a href="http://www.refworks.com/mobile/"><strong>RefWorks</strong><br /><span class="smallprint">Online research management, writing and collaboration tool. Must enter your RefWorks login, password, and UCSF Group Code. (UCSF Only)</span></a></li> 
<li><a href="https://scifinder.cas.org/mobile"><strong>SciFinder Scholar Web Version (Chemical Abstracts)</strong><br /> 
    <span class="smallprint">Chemistry literature and chemical substance information.
    Requires personal profile name and password. Create one at http://software.chem.ucla.edu/scifind/SfsUCSFweb.html using a non-mobile browser.
(UC Only)</span></a></li> 
    <li><a href="http://online.statref.com/?grpalias=ldbl&mobile=true"><strong>STAT!Ref</strong><br /><span class="smallprint">Full text medical, nursing and dental textbooks; drug references, medical dictionaries, and medical reference sources. (UC Only)</span></a></li> 
  <li class="menu-last"><a href="http://mobile.uptodate.com/"><strong>UpToDate</strong><br /> 
    <span class="smallprint">Review-based clinical information resource.
    No need to log in. Works only on the UCSF network. No VPN remote access.
(UCSF Only)</span></a></li> 
</ol> 
</div> 
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>