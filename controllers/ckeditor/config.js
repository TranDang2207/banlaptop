/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	//Sử dụng trình quản lý củ
	//config.language = 'vi';
	//config.uiColor = '#0069A8';
    //config.filebrowserBrowseUrl = 'Filemanager/'; //NẾU SỬ DỤNG FILEMANAGER OLD
   
  
   
   
   //NẾU SỬ DỤNG FILEMANAGER NEW
   /*config.filebrowserBrowseUrl = 'kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?type=flash';*/
   
   //sử dụng Responsive File Manager
   config.filebrowserBrowseUrl = 'fileLibrary/dialog.php?type=2&editor=ckeditor&fldr=';
   config.filebrowserImageBrowseUrl = 'fileLibrary/dialog.php?type=1&editor=ckeditor&fldr=';
   config.filebrowserFlashBrowseUrl = 'fileLibrary/dialog.php?type=1&editor=ckeditor&fldr=';
   config.filebrowserUploadUrl = 'fileLibrary/dialog.php?type=2&editor=ckeditor&fldr=';
 
  
  
};


