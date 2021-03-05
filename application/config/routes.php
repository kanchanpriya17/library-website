<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'Home_Controller';





$route['page/(:num)']= 'Page_Controller';

$route['page/(:any)']= 'Page_Controller';

$route['page/(:any)/(:num)']= 'Page_Controller';

$route['page/(:num)/(:num)/(:any)']= 'Error_Controller';

$route['page/(:any)/(:num)/(:any)']= 'Error_Controller';

$route['post/(:num)']= 'post/Post_Controller';

$route['testimonials_details/(:num)']= 'post/Post_Controller/testi_details';

$route['syllabus_details/(:num)']= 'post/Post_Controller/service_details';
$route['poems/(:num)']= 'post/Post_Controller/service_details';
$route['newsdetails/(:num)']= 'post/Post_Controller/news_details';
$route['stories/(:num)']= 'post/Post_Controller/doctor_details';
$route['blogs_details/(:num)']= 'post/Post_Controller/test_details';


$route['pattron_details/(:num)']= 'post/Post_Controller/activitydetails';

$route['post1/(:any)']= 'post1/Post_Controller';

$route['admin'] = 'admin/Login_Controller';

$route['login'] = 'admin/Login_Controller/login';

$route['logout'] = 'admin/Login_Controller/logout';

$route['admin/dashboard']  = 'admin/dashboard/Dashboard_Controller';





/****************************SLIDER START************************************/

$route['admin/slider'] = 'admin/slider/Slider_Controller';

$route['admin/addslider'] = 'admin/slider/Slider_Controller/addnew';

$route['sliderupload'] = 'admin/slider/Slider_Controller/uploadimg';

$route['slidersave'] = 'admin/slider/Slider_Controller/save';

$route['getsliderdetails'] = 'admin/slider/Slider_Controller/getdetails';

$route['delteslider'] = 'admin/slider/Slider_Controller/del';

//$route['admin/slider'] = 'admin/slider/Slider_Controller/search';

$route['admin/editslider'] = 'admin/slider/Slider_Controller/editslider';

$route['sliderupdate'] = 'admin/slider/Slider_Controller/update';

$route['admin/slider/(:num)'] = 'admin/slider/Slider_Controller/index/$1';

/****************************SLIDER END************************************/

/*********PRIYA START*************/

$route['admin/priya'] = 'admin/priya/Priya_Controller';

$route['loadpriya'] = 'admin/priya/Priya_Controller/loadpriya';

$route['admin/addpriya'] = 'admin/priya/Priya_Controller/addnew';

$route['priyaupload'] = 'admin/priya/Priya_Controller/uploadimg';

$route['priyasave'] = 'admin/priya/Priya_Controller/save';

$route['getpriyadetails'] = 'admin/priya/Priya_Controller/getdetails';

$route['admin/editpriya'] = 'admin/priya/Priya_Controller/edit';

$route['priyaupdate'] = 'admin/priya/Priya_Controller/update';

$route['admin/priya/(:num)'] = 'admin/priya/Priya_Controller/index/$1';

$route['deletepriya'] = 'admin/priya/Priya_Controller/del';

$route['admin/searchpriya'] = 'admin/priya/Priya_Controller/search';

$route['admin/searchpriya(:any)/(:num)'] = 'admin/priya/Priya_Controller/search/$1';

/*********PRIYA   END*************/

/****************************AWARD START************************************/

$route['admin/award'] = 'admin/award/Award_Controller';

$route['loadaward'] = 'admin/award/Award_Controller/loadaward';

$route['admin/addaward'] = 'admin/award/Award_Controller/addnew';

$route['awardupload'] = 'admin/award/Award_Controller/uploadimg';

$route['awardsave'] = 'admin/award/Award_Controller/save';

$route['getawarddetails'] = 'admin/award/Award_Controller/getdetails';

$route['admin/editaward'] = 'admin/award/Award_Controller/edit';

$route['awardupdate'] = 'admin/award/Award_Controller/update';

$route['admin/award/(:num)'] = 'admin/award/Award_Controller/index/$1';

$route['deleteaward'] = 'admin/award/Award_Controller/del';

$route['admin/searchaward'] = 'admin/award/Award_Controller/search';

$route['admin/searchaward(:any)/(:num)'] = 'admin/award/Award_Controller/search/$1';

/****************************AWARD   END************************************/


/****************************ASSOCIATE START************************************/

$route['admin/associate'] = 'admin/associate/Associate_Controller';

$route['loadassociate'] = 'admin/associate/Associate_Controller/loadassociate';

$route['admin/addassociate'] = 'admin/associate/Associate_Controller/addnew';

$route['associateupload'] = 'admin/associate/Associate_Controller/uploadimg';

$route['associatesave'] = 'admin/associate/Associate_Controller/save';

$route['getassociatedetails'] = 'admin/associate/Associate_Controller/getdetails';

$route['admin/editassociate'] = 'admin/associate/Associate_Controller/edit';

$route['associateupdate'] = 'admin/associate/Associate_Controller/update';

$route['admin/associate/(:num)'] = 'admin/associate/Associate_Controller/index/$1';

$route['deleteassociate'] = 'admin/associate/Associate_Controller/del';

$route['admin/searchassociate'] = 'admin/associate/Associate_Controller/search';

$route['admin/searchassociate(:any)/(:num)'] = 'admin/associate/Associate_Controller/search/$1';

/****************************ASSOCIATE   END************************************/







/****************************SITE OFFICE START************************************/

$route['admin/siteoffice'] = 'admin/siteoffice/Siteoffice_Controller';

$route['loadsiteoffice'] = 'admin/siteoffice/Siteoffice_Controller/loadsiteoffice';

$route['admin/addsiteoffice'] = 'admin/siteoffice/Siteoffice_Controller/addnew';

$route['siteofficeupload'] = 'admin/siteoffice/Siteoffice_Controller/uploadimg';

$route['siteofficesave'] = 'admin/siteoffice/Siteoffice_Controller/save';

$route['getsiteofficedetails'] = 'admin/siteoffice/Siteoffice_Controller/getdetails';

$route['admin/editsiteoffice'] = 'admin/siteoffice/Siteoffice_Controller/edit';

$route['siteofficeupdate'] = 'admin/siteoffice/Siteoffice_Controller/update';

$route['admin/siteoffice/(:num)'] = 'admin/siteoffice/Siteoffice_Controller/index/$1';

$route['deletesiteoffice'] = 'admin/siteoffice/Siteoffice_Controller/del';

$route['admin/searchsiteoffice'] = 'admin/siteoffice/Siteoffice_Controller/search';

$route['admin/searchsiteoffice(:any)/(:num)'] = 'admin/siteoffice/Siteoffice_Controller/search/$1';

/****************************SITE OFFICE END************************************/




/****************************OUR EQUIPMENT START************************************/

$route['admin/equipment'] = 'admin/equipment/Equipment_Controller';

$route['loadequipment'] = 'admin/equipment/Equipment_Controller/loadequipment';

$route['admin/addequipment'] = 'admin/equipment/Equipment_Controller/addnew';

$route['equipmentupload'] = 'admin/equipment/Equipment_Controller/uploadimg';

$route['equipmentsave'] = 'admin/equipment/Equipment_Controller/save';

$route['getequipmentdetails'] = 'admin/equipment/Equipment_Controller/getdetails';

$route['admin/editequipment'] = 'admin/equipment/Equipment_Controller/edit';

$route['equipmentupdate'] = 'admin/equipment/Equipment_Controller/update';

$route['admin/equipment/(:num)'] = 'admin/equipment/Equipment_Controller/index/$1';

$route['deleteequipment'] = 'admin/equipment/Equipment_Controller/del';

$route['admin/searchequipment'] = 'admin/equipment/Equipment_Controller/search';

$route['admin/searchequipment(:any)/(:num)'] = 'admin/equipment/Equipment_Controller/search/$1';

/****************************OUR EQUIPMENT END************************************/























/****************************CLIENTS START************************************/

$route['admin/services'] = 'admin/services/Services_Controller';

$route['admin/addservices'] = 'admin/services/Services_Controller/addnew';

$route['servicesupload'] = 'admin/services/Services_Controller/uploadimg';

$route['servicessave'] = 'admin/services/Services_Controller/save';

$route['getservicesdetails'] = 'admin/services/Services_Controller/getdetails';

$route['delteservices'] = 'admin/services/Services_Controller/del';

//$route['admin/slider'] = 'admin/slider/Slider_Controller/search';

$route['admin/editservices'] = 'admin/services/Services_Controller/editservices';

$route['servicesupdate'] = 'admin/services/Services_Controller/update';

$route['admin/services/(:num)'] = 'admin/services/Services_Controller/index/$1';

$route['admin/searchservices'] = 'admin/services/Services_Controller/search';

$route['admin/searchcservices(:any)/(:num)'] = 'admin/services/Services_Controller/search/$1';

/****************************CLIENTS END************************************/



/****************************CATEGORY START************************************/

$route['admin/category'] = 'admin/category/Category_Controller';

$route['admin/addcategory'] = 'admin/category/Category_Controller/addnew';

$route['categorysave'] = 'admin/category/Category_Controller/save';

$route['getcatdetails'] = 'admin/category/Category_Controller/getdetails';

$route['admin/editcategory'] = 'admin/category/Category_Controller/edit';

$route['categoryupdate'] = 'admin/category/Category_Controller/update';

$route['deltecategory'] = 'admin/category/Category_Controller/del';

$route['admin/category/(:num)'] = 'admin/category/Category_Controller/index/$1';

/****************************CATEGORY  END************************************/





/****************************VIDEO CATEGORY START************************************/

$route['admin/video-category'] = 'admin/video-category/Video_Category_Controller';

$route['admin/addvideocategory'] = 'admin/video-category/Video_Category_Controller/addnew';

$route['videocategorysave'] = 'admin/video-category/Video_Category_Controller/save';

$route['getvideocatdetails'] = 'admin/video-category/Video_Category_Controller/getdetails';

$route['admin/editvideocategory'] = 'admin/video-category/Video_Category_Controller/edit';

$route['videocategoryupdate'] = 'admin/video-category/Video_Category_Controller/update';

$route['deltevideocategory'] = 'admin/video-category/Video_Category_Controller/del';

$route['admin/video-category/(:num)'] = 'admin/video-category/Video_Category_Controller/index/$1';

/****************************VIDEO CATEGORY  END************************************/



/****************************POST START************************************/

$route['admin/post'] = 'admin/post/Post_Controller';

$route['admin/addpost'] = 'admin/post/Post_Controller/addnew';

$route['loadcat1'] = 'admin/post/Post_Controller/loadcat1';

$route['postupload'] = 'admin/post/Post_Controller/uploadimg';

$route['postsave'] = 'admin/post/Post_Controller/save';

$route['getpostdetails'] = 'admin/post/Post_Controller/getdetails';

$route['admin/editpost'] = 'admin/post/Post_Controller/edit';

$route['postupdate'] = 'admin/post/Post_Controller/update';

$route['admin/post/(:num)'] = 'admin/post/Post_Controller/index/$1';

$route['deletepost'] = 'admin/post/Post_Controller/del';

$route['admin/searchpost'] = 'admin/post/Post_Controller/search';

$route['admin/searchpost(:any)/(:num)'] = 'admin/post/Post_Controller/search/$1';

/****************************POST  END************************************/



/****************************DOCTOR START************************************/

$route['admin/doctor'] = 'admin/doctor/Doctor_Controller';

$route['admin/adddoctor'] = 'admin/doctor/Doctor_Controller/addnew';

$route['doctorupload'] = 'admin/doctor/Doctor_Controller/uploadimg';

$route['doctorsave'] = 'admin/doctor/Doctor_Controller/save';

$route['getdoctordetails'] = 'admin/doctor/Doctor_Controller/getdetails';

$route['admin/editdoctor'] = 'admin/doctor/Doctor_Controller/edit';

$route['doctorupdate'] = 'admin/doctor/Doctor_Controller/update';

$route['admin/doctor/(:num)'] = 'admin/doctor/Doctor_Controller/index/$1';

$route['deletedoctor'] = 'admin/doctor/Doctor_Controller/del';

$route['admin/searchdoctor'] = 'admin/doctor/Doctor_Controller/search';

$route['admin/searchdoctor(:any)/(:num)'] = 'admin/doctor/Doctor_Controller/search/$1';

/****************************DOCTOR  END************************************/



/****************************NEWS START************************************/
$route['admin/news'] = 'admin/news/News_Controller';
$route['admin/addnews'] = 'admin/news/News_Controller/addnew';
$route['newsupload'] = 'admin/news/News_Controller/uploadimg';
$route['newssave'] = 'admin/news/News_Controller/save';
$route['getnewsdetails'] = 'admin/news/News_Controller/getdetails';
$route['admin/editnews'] = 'admin/news/News_Controller/edit';
$route['newsupdate'] = 'admin/news/News_Controller/update';
$route['admin/news/(:num)'] = 'admin/news/News_Controller/index/$1';
$route['deletenews'] = 'admin/news/News_Controller/del';
$route['admin/searchnews'] = 'admin/news/News_Controller/search';
$route['admin/searchnews(:any)/(:num)'] = 'admin/news/News_Controller/search/$1';
/****************************NEWS  END************************************/

/****************************BRAND START************************************/
$route['admin/brand'] = 'admin/brand/Brand_Controller';
$route['admin/addbrand'] = 'admin/brand/Brand_Controller/addnew';
$route['brandupload'] = 'admin/brand/Brand_Controller/uploadimg';
$route['brandsave'] = 'admin/brand/Brand_Controller/save';
$route['getbranddetails'] = 'admin/brand/Brand_Controller/getdetails';
$route['admin/editbrand'] = 'admin/brand/Brand_Controller/edit';
$route['brandupdate'] = 'admin/brand/Brand_Controller/update';
$route['admin/brand/(:num)'] = 'admin/brand/Brand_Controller/index/$1';
$route['deletebrand'] = 'admin/brand/Brand_Controller/del';
$route['admin/searchbrand'] = 'admin/brand/Brand_Controller/search';
$route['admin/searchbrand(:any)/(:num)'] = 'admin/brand/Brand_Controller/search/$1';
/****************************BRAND  END************************************/


/****************************STAFF START************************************/

$route['admin/staff'] = 'admin/staff/Staff_Controller';

$route['admin/addstaff'] = 'admin/staff/Staff_Controller/addnew';;

$route['staffsave'] = 'admin/staff/Staff_Controller/save';

$route['getstaffdetails'] = 'admin/staff/Staff_Controller/getdetails';

$route['admin/editstaff'] = 'admin/staff/Staff_Controller/edit';

$route['staffupdate'] = 'admin/staff/Staff_Controller/update';

$route['admin/staff/(:num)'] = 'admin/staff/Staff_Controller/index/$1';

$route['deletestaff'] = 'admin/staff/Staff_Controller/del';

$route['admin/searchstaff'] = 'admin/staff/Staff_Controller/search';

$route['admin/searchstaff(:any)/(:num)'] = 'admin/staff/Staff_Controller/search/$1';

/****************************STAFF  END************************************/



/****************************MEMBER START************************************/

$route['admin/member'] = 'admin/member/Member_Controller';

$route['admin/addmember'] = 'admin/member/Member_Controller/addnew';;

$route['membersave'] = 'admin/member/Member_Controller/save';

$route['getmemberdetails'] = 'admin/member/Member_Controller/getdetails';

$route['admin/editmember'] = 'admin/member/Member_Controller/edit';

$route['memberupdate'] = 'admin/member/Member_Controller/update';

$route['admin/member/(:num)'] = 'admin/member/Member_Controller/index/$1';

$route['deletemember'] = 'admin/member/Member_Controller/del';

$route['admin/searchmember'] = 'admin/member/Member_Controller/search';

$route['admin/searchmember(:any)/(:num)'] = 'admin/member/Member_Controller/search/$1';

/****************************MEMBER  END************************************/



/****************************FILE START************************************/

$route['admin/file'] = 'admin/file/File_Controller';

$route['admin/file/(:num)'] = 'admin/file/File_Controller/index/$1';

$route['admin/searchfile'] = 'admin/file/File_Controller/search';

$route['admin/searchfile(:any)/(:num)'] = 'admin/file/File_Controller/search/$1';

$route['getfiledetails'] = 'admin/file/File_Controller/getdetails';

$route['admin/editfile'] = 'admin/file/File_Controller/edit';

$route['fileupdate'] = 'admin/file/File_Controller/update';

$route['fileupdate1'] = 'admin/file/File_Controller/update1';

$route['deletefile'] = 'admin/file/File_Controller/del';

/****************************FILE  END************************************/



/****************************ALBUM START************************************/
$route['admin/album'] = 'admin/album/Album_Controller';
$route['admin/addalbum'] = 'admin/album/Album_Controller/addnew';
$route['albumupload'] = 'admin/album/Album_Controller/uploadimg';
$route['albumsave'] = 'admin/album/Album_Controller/save';
$route['getalbumdetails'] = 'admin/album/Album_Controller/getdetails';
$route['admin/editalbum'] = 'admin/album/Album_Controller/edit';
$route['albumupdate'] = 'admin/album/Album_Controller/update';
$route['deltealbum'] = 'admin/album/Album_Controller/del';
$route['admin/album/(:num)'] = 'admin/album/Album_Controller/index/$1';
/****************************ALBUM  END************************************/



/****************************GALLERY START************************************/
$route['admin/gallery'] = 'admin/gallery/Gallery_Controller';
$route['admin/addgallery'] = 'admin/gallery/Gallery_Controller/addnew';
$route['loadalbum'] = 'admin/gallery/Gallery_Controller/loadalbum';
$route['galleryupload'] = 'admin/gallery/Gallery_Controller/uploadimg';
$route['gallerysave'] = 'admin/gallery/Gallery_Controller/save';
$route['getgallerydetails'] = 'admin/gallery/Gallery_Controller/getdetails';
$route['admin/editgallery'] = 'admin/gallery/Gallery_Controller/edit';
$route['galleryupdate'] = 'admin/gallery/Gallery_Controller/update';
$route['admin/gallery/(:num)'] = 'admin/gallery/Gallery_Controller/index/$1';
$route['deletegallery'] = 'admin/gallery/Gallery_Controller/del';
$route['admin/searchgallery'] = 'admin/gallery/Gallery_Controller/search';
$route['admin/searchgallery(:any)/(:num)'] = 'admin/gallery/Gallery_Controller/search/$1';
/****************************GALLERY  END************************************/


/****************************IMAGES START************************************/
$route['admin/images'] = 'admin/images/Gallery_Controller';
$route['admin/addgallery1'] = 'admin/images/Gallery_Controller/addnew';
$route['loadalbum1'] = 'admin/images/Gallery_Controller/loadalbum';
$route['galleryupload1'] = 'admin/images/Gallery_Controller/uploadimg';
$route['gallerysave1'] = 'admin/images/Gallery_Controller/save';
$route['getgallerydetails1'] = 'admin/images/Gallery_Controller/getdetails';
$route['admin/editgallery1'] = 'admin/images/Gallery_Controller/edit';
$route['galleryupdate1'] = 'admin/images/Gallery_Controller/update';
$route['admin/gallery1/(:num)'] = 'admin/images/Gallery_Controller/index/$1';
$route['deletegallery1'] = 'admin/images/Gallery_Controller/del';
$route['admin/searchgallery1'] = 'admin/images/Gallery_Controller/search';
$route['admin/searchgallery1(:any)/(:num)'] = 'admin/images/Gallery_Controller/search/$1';
/****************************GALLERY  END************************************/




/****************************PAGE START************************************/
$route['admin/page'] = 'admin/page/Page_Controller';
$route['loadpage'] = 'admin/page/Page_Controller/loadpage';
$route['admin/addpage'] = 'admin/page/Page_Controller/addnew';
$route['pageupload'] = 'admin/page/Page_Controller/uploadimg';
$route['pageupload1'] = 'admin/page/Page_Controller/uploadimg1';
$route['pagesave'] = 'admin/page/Page_Controller/save';
$route['getpagedetails'] = 'admin/page/Page_Controller/getdetails';
$route['admin/editpage'] = 'admin/page/Page_Controller/edit';
$route['pageupdate'] = 'admin/page/Page_Controller/update';
$route['admin/page/(:num)'] = 'admin/page/Page_Controller/index/$1';
$route['deletepage'] = 'admin/page/Page_Controller/del';
$route['admin/searchpage'] = 'admin/page/Page_Controller/search';
$route['admin/searchpage(:any)/(:num)'] = 'admin/page/Page_Controller/search/$1';
/****************************PAGE   END************************************/

/****************************TEST START************************************/
$route['admin/test'] = 'admin/test/Test_Controller';
$route['admin/addtest'] = 'admin/test/Test_Controller/addnew';
$route['testupload'] = 'admin/test/Test_Controller/uploadimg';
$route['testsave'] = 'admin/test/Test_Controller/save';
$route['gettestdetails'] = 'admin/test/Test_Controller/getdetails';
$route['admin/edittest'] = 'admin/test/Test_Controller/edit';
$route['testupdate'] = 'admin/test/Test_Controller/update';
$route['admin/test/(:num)'] = 'admin/test/Test_Controller/index/$1';
$route['deletetest'] = 'admin/test/Test_Controller/del';

/****************************TEST  END************************************/
/****************************TEST APPLICATION START************************************/
$route['admin/testapplication'] = 'admin/testapplication/TestApplication_Controller';
$route['testapplicationupload'] = 'admin/testapplication/TestApplication_Controller/uploadimg';
$route['gettestapplicationdetails'] = 'admin/testapplication/TestApplication_Controller/getdetails';
$route['admin/edittestapplication'] = 'admin/testapplication/TestApplication_Controller/edit';
$route['testapplicationupdate'] = 'admin/testapplication/TestApplication_Controller/update';
$route['admin/testapplication/(:num)'] = 'admin/testapplication/TestApplication_Controller/index/$1';
$route['deletetestapplication'] = 'admin/testapplication/TestApplication_Controller/del';
$route['admin/searchtestapplication'] = 'admin/testapplication/TestApplication_Controller/search';
$route['admin/searchtestapplication(:any)/(:num)'] = 'admin/testapplication/TestApplication_Controller/search/$1';
/****************************TEST  APPLICATION END************************************/

/****************************SETTING START************************************/

$route['admin/setting'] = 'admin/setting/Setting_Controller';

$route['loadsetting'] = 'admin/setting/Setting_Controller/loadsetting';

$route['settingupdate'] = 'admin/setting/Setting_Controller/update';

/****************************SETTING END************************************/



/****************************USER START************************************/

$route['admin/user'] = 'admin/user/User_Controller';

$route['loaduser'] = 'admin/user/User_Controller/loaduser';

$route['userupdate'] = 'admin/user/User_Controller/update';

/****************************USER END************************************/

$route['sendmail'] = 'Contact_Controller/send';
$route['sendmail1'] = 'Contact_Controller/send1';
$route['testinsert'] = 'Contact_Controller/testinsert';
$route['user_login'] = 'Contact_Controller/user_login';
$route['check_otp'] = 'Contact_Controller/check_otp';
$route['user_logout'] = 'Contact_Controller/user_logout';






/****************************enquiry Email starts************************************/

$route['sendenquirymail'] = 'Contact_Controller/enquiry';

/****************************Enquiry Email ENDs************************************/


/****************************Dealership Email Starts************************************/
$route['senddealermail'] = 'Contact_Controller/dealershipsend';
/**************************Dealership Email Ends**************************************/



/****************************Career Page Starts************************************/
$route['sendcvuploadmail'] = 'Contact_Controller/cvupload';
/**************************Dealership Email Ends**************************************/











/*********************************SUBSCRIBER START*****************************************/



$route['addsubscriber'] = 'admin/subscriber/Subscriber_Controller/add';

$route['admin/subscriber'] = 'admin/subscriber/Subscriber_Controller/index';

$route['admin/subscriber/(:num)'] = 'admin/subscriber/Subscriber_Controller/index/$1';

$route['admin/searchsubscriber'] = 'admin/subscriber/Subscriber_Controller/search';

$route['admin/searchsubscriber(:any)/(:num)'] = 'admin/subscriber/Subscriber_Controller/search/$1';

/*********************************SUBSCRIBER END*****************************************/




/*********************************expression START*****************************************/



$route['addexpression'] = 'admin/expression/Expression_Controller/add';

$route['admin/expression'] = 'admin/expression/Expression_Controller/index';

$route['admin/expression/(:num)'] = 'admin/expression/Expression_Controller/index/$1';

$route['admin/searchexpression'] = 'admin/expression/Expression_Controller/search';

$route['deleteexpression'] = 'admin/expression/Expression_Controller/del';



$route['admin/searchexpression(:any)/(:num)'] = 'admin/expression/Expression_Controller/search/$1';

/*********************************expression END*****************************************/



/*********************************SELLER START*****************************************/

$route['addseller'] = 'admin/seller/Seller_Controller/add';

$route['admin/seller'] = 'admin/seller/Seller_Controller/index';

$route['admin/seller/(:num)'] = 'admin/seller/Seller_Controller/index/$1';

$route['admin/searchseller'] = 'admin/seller/Seller_Controller/search';

$route['admin/searchseller(:any)/(:num)'] = 'admin/seller/Seller_Controller/search/$1';

/*********************************SELLER END*****************************************/



/**********************************MEMBER START***********************************/

$route['registration'] = 'admin/Registration_Controller/register';

$route['member'] = 'member/Login_Controller/index';

$route['member/login'] = 'member/Login_Controller/login';

$route['member/myprofile'] = 'member/profile/Profile_Controller/index';

$route['member/editprofile'] = 'member/profile/Profile_Controller/edit';

$route['member/changepassword'] = 'member/profile/Profile_Controller/changepassword';

$route['member/updatepassword'] = 'member/profile/Profile_Controller/updatepassword';

$route['member/updateprofile'] = 'member/profile/Profile_Controller/update';

$route['member/addfiles'] = 'member/profile/Profile_Controller/addfiles';

$route['member/myfiles'] = 'member/profile/Profile_Controller/myfiles';

$route['member/myfiles/(:any)']= 'member/profile/Profile_Controller/myfiles';

$route['member/myfiles/(:any)/(:any)']= 'member/profile/Profile_Controller/myfiles';

$route['uploadfile'] = 'member/profile/Profile_Controller/uploadfile';

$route['member/insertfile'] = 'member/profile/Profile_Controller/insertfile';

$route['member/logout'] = 'member/Login_Controller/logout';

$route['member/myaccount']  = 'member/dashboard/Dashboard_Controller';

/**********************************MEMBER END***********************************/



/*********************************LOGO START*****************************************/

$route['admin/logo'] = 'admin/logo/Logo_Controller';

$route['logoupload'] = 'admin/logo/Logo_Controller/uploadimg';

$route['logoupdate'] = 'admin/logo/Logo_Controller/update';

/*********************************LOGO END*****************************************/



/*********************************Vister Section START*****************************************/

/* $route['admin/visiter'] = 'admin/visiter/Visiter_Controller'; */
/* 
$route['admin/visiter'] = 'admin/visiter/Visiter_Controller/index';
*/

$route['admin/visiter'] = 'admin/visiter/Visiter_Controller';




/*
$route['admin/visiter/(:num)'] = 'admin/visiter/Visiter_Controller/index/$1';*/
/*********************************Visiter Section END*****************************************/





























/*********************************SIDE BANNER START*****************************************/

$route['admin/sidebanner'] = 'admin/sidebanner/Sb_Controller';

$route['sidebannerupload'] = 'admin/sidebanner/Sb_Controller/uploadimg';

$route['sidebannerupdate'] = 'admin/sidebanner/Sb_Controller/update';

$route['nonteaching']= 'Page_Controller/staff';

/*********************************SIDE BANNER END*****************************************/

$route['translate_uri_dashes'] = FALSE;

$route['404_override'] = 'Error_Controller';

