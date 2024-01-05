<?php

defined('BASEPATH') OR exit('No direct script access allowed');





$route['default_controller'] = "login";

$route['404_override'] = 'login/error';





/*********** USER DEFINED ROUTES *******************/



$route['loginMe'] = 'login/loginMe';

$route['dashboard'] = 'user';

$route['logout'] = 'user/logout';



/*********** PARTNER CONTROLLER ROUTES *******************/
$route['partner'] = 'Partner/partnerListing';
$route['addPartner'] = "Partner/addPartner";
$route['addNewPartner'] = "Partner/addNewPartner";
$route['deletePartner'] = "Partner/deletePartner";
$route['editPartner/(:num)'] = "Partner/editPartner/$1";
$route['editPartnerData'] = "Partner/editPartnerData";

/*********** ADMIN CONTROLLER ROUTES *******************/

$route['noaccess'] = 'login/noaccess';

$route['userListing'] = 'admin/userListing';

$route['userListing/(:num)'] = "admin/userListing/$1";

$route['addNew'] = "admin/addNew";

$route['addNewUser'] = "admin/addNewUser";

$route['editOld'] = "admin/editOld";

$route['editOld/(:num)'] = "admin/editOld/$1";

$route['editUser'] = "admin/editUser";

$route['deleteUser'] = "admin/deleteUser";



$route['adminCompanyListing'] = 'admin/adminCompanyListing';

$route['adminCompanyListing/(:num)'] = "admin/adminCompanyListing/$1";

$route['addNewAdminCompany'] = "admin/addNewAdminCompany";

$route['addNewAdminCompanies'] = "admin/addNewAdminCompanies";

$route['editOldAdminCompany'] = "admin/editOldAdminCompany";

$route['editOldAdminCompany/(:num)'] = "admin/editOldAdminCompany/$1";

$route['editAdminCompany'] = "admin/editAdminCompany";

$route['deleteAdminCompany'] = "admin/deleteAdminCompany";



$route['upload_logo'] = "admin/do_upload";







$route['log-history'] = "admin/logHistory";

$route['log-history-backup'] = "admin/logHistoryBackup";

$route['log-history/(:num)'] = "admin/logHistorysingle/$1";

$route['log-history/(:num)/(:num)'] = "admin/logHistorysingle/$1/$2";

$route['backupLogTable'] = "admin/backupLogTable";

$route['backupLogTableDelete'] = "admin/backupLogTableDelete";

$route['log-history-upload'] = "admin/logHistoryUpload";

$route['logHistoryUploadFile'] = "admin/logHistoryUploadFile";



/*********** MANAGER CONTROLLER ROUTES *******************/

$route['tasks'] = "manager/tasks";

$route['addNewTask'] = "manager/addNewTask";

$route['addNewTasks'] = "manager/addNewTasks";

$route['editOldTask/(:num)'] = "manager/editOldTask/$1";

$route['editTask'] = "manager/editTask";

$route['deleteTask/(:num)'] = "manager/deleteTask/$1";









/*********** Master Cab/Vendor CONTROLLER ROUTES  *******************/

$route['vendorListing'] = 'vendor/vendorListing';

$route['vendorListing/(:num)'] = "vendor/vendorListing/$1";

$route['addNewVendor'] = "vendor/addNewVendor";

$route['addNewVendors'] = "vendor/addNewVendors";

$route['editOldVendor'] = "vendor/editOldVendor";

$route['editOldVendor/(:num)'] = "vendor/editOldVendor/$1";

$route['editVendor'] = "vendor/editVendor";

$route['deleteVendor'] = "vendor/deleteVendor";



$route['viewVendor/(:num)'] = 'vendor/viewVendor/$1';



/** Vendor PF/ESI Information **/

$route['vendorCharges'] = 'vendor/vendorCharges';

$route['addNewVendorCharge'] = "vendor/addNewVendorCharge";

$route['addNewVendorCharges'] = "vendor/addNewVendorCharges";

$route['editOldVendorCharge/(:num)'] = "vendor/editOldVendorCharge/$1";

$route['editVendorCharge'] = "vendor/editVendorCharge";

$route['deleteVendorCharge'] = "vendor/deleteVendorCharge";



/** Vendor Loan Information **/

$route['vendorLoans'] = 'vendor/vendorLoans';

$route['addNewVendorLoan'] = "vendor/addNewVendorLoan";

$route['addNewVendorLoans'] = "vendor/addNewVendorLoans";

$route['editOldVendorLoan/(:num)'] = "vendor/editOldVendorLoan/$1";

$route['editVendorLoan'] = "vendor/editVendorLoan";

$route['deleteVendorLoan'] = "vendor/deleteVendorLoan";





$route['addNewVehicle'] = "vehicle/addNewVehicle";

$route['addNewVehicles'] = "vehicle/addNewVehicles";

$route['editOldVehicle/(:num)'] = "vehicle/editOldVehicle/$1";

$route['editVehicle'] = "vehicle/editVehicle";

$route['deleteVehicle'] = "vehicle/deleteVehicle";



$route['uploadVehicleLogo/(:num)'] = "vehicle/uploadVehicleLogo/$1";

$route['upload_vehicle_files'] = "vehicle/upload_vehicle_files";



$route['advanceListing'] = 'vehicle/advanceListing';

$route['addNewAdvance'] = 'vehicle/addNewAdvance';

$route['addNewAdvances'] = 'vehicle/addNewAdvances';

$route['editOldAdvance/(:num)'] = "vehicle/editOldAdvance/$1";

$route['editAdvance'] = "vehicle/editAdvance";

$route['deleteAdvance'] = "vehicle/deleteAdvance";



/*** vehicleTaxListings  ***/

$route['vehicleTaxListings'] = 'vehicle/vehicleTaxListings';

$route['addNewVehicleTax'] = 'vehicle/addNewVehicleTax';

$route['addNewVehicleTaxs'] = 'vehicle/addNewVehicleTaxs';

$route['editOldVehicleTaxs/(:num)'] = "vehicle/editOldVehicleTaxs/$1";

$route['editVehicleTaxs'] = "vehicle/editVehicleTaxs";



$route['editOldVehicleMcd/(:num)'] = "vehicle/editOldVehicleMcd/$1";

$route['editVehicleMcd'] = "vehicle/editVehicleMcd";

$route['editOldVehicleTax/(:num)'] = "vehicle/editOldVehicleTax/$1";

$route['editVehicleTax'] = "vehicle/editVehicleTax";



$route['deleteVehicleMcd'] = "vehicle/deleteVehicleMcd";

$route['deleteVehicleTaxs'] = "vehicle/deleteVehicleTaxs";





/*********** Master Company CONTROLLER ROUTES  *******************/

$route['companyListing'] = 'company/companyListing';

$route['companyListing/(:num)'] = "company/companyListing/$1";

$route['addNewCompany'] = "company/addNewCompany";

$route['addNewCompanies'] = "company/addNewCompanies";

$route['editOldCompany'] = "company/editOldCompany";

$route['editOldCompany/(:num)'] = "company/editOldCompany/$1";

$route['editCompany'] = "company/editCompany";

$route['deleteCompany'] = "company/deleteCompany";



$route['getCompanyRate'] = "company/getCompanyRate";



$route['getCabRate'] = "master/getCabRate";

$route['cancelRoster'] = "master/cancelRoster";

$route['cancelRosterWithTaxi'] = "master/cancelRosterWithTaxi";

$route['deleteRoster'] = "master/deleteRoster";









$route['addNewCompanyBranch'] = 'company/addNewCompanyBranch';

$route['addNewBranch'] = 'company/addNewBranch';

$route['companyBranchListing'] = 'company/companyBranchListing';

$route['editOldCompanyBranch/(:num)'] = "company/editOldCompanyBranch/$1";

$route['editCompanyBranch'] = "company/editCompanyBranch";

$route['deleteCompanyBranch'] = "company/deleteCompanyBranch";



/*********** Master Company CONTROLLER ROUTES  *******************/

$route['cabCompanyListing'] = 'cabcompany/cabCompanyListing';

$route['addNewCabCompany'] = "cabcompany/addNewCabCompany";

$route['addNewCabCompanies'] = "cabcompany/addNewCabCompanies";

$route['updateCompanyRate'] = "cabcompany/updateCompanyRate";

$route['editOldCabCompany'] = "cabcompany/editOldCabCompany";

$route['editOldCabCompany/(:num)'] = "cabcompany/editOldCabCompany/$1";

$route['editCabCompanyRate/(:num)/(:num)/(:num)'] = "cabcompany/editCabCompanyRate/$1/$2/$3";

$route['editCabCompany'] = "cabcompany/editCabCompany";

$route['deleteCabCompany'] = "cabcompany/deleteCabCompany";



$route['getCabCompanyRate'] = "cabcompany/getCabCompanyRate";



//$route['addNewCabCompanyTest'] = "cabcompany/addNewCabCompanyTest";

$route['viewCabCompany/(:num)'] = "cabcompany/viewCabCompanyRates/$1";





/*********** Master Vechicle CONTROLLER ROUTES *******************/

$route['vehicleTypes'] = "vehicle/vehicleTypes";

$route['addNewVehicleType'] = "vehicle/addNewVehicleType";

$route['addNewVehicleTypes'] = "vehicle/addNewVehicleTypes";

$route['editOldVehicleType/(:num)'] = "vehicle/editOldVehicleType/$1";

$route['editVehicleType'] = "vehicle/editVehicleType";

$route['deleteVehicleType/(:num)'] = "vehicle/deleteVehicleType/$1";





/* Zone Details */

$route['zoneTypesListing'] = "zone/zoneTypesListing";

$route['addNewZoneType'] = "zone/addNewZoneType";

$route['addNewZoneTypes'] = "zone/addNewZoneTypes";

$route['editOldZoneType/(:num)'] = "zone/editOldZoneType/$1";

$route['editZoneType'] = "zone/editZoneType";

$route['deleteZoneType/(:num)'] = "zone/deleteZoneType/$1";



$route['zoneListing'] = "zone/zoneListing";

$route['addNewZone'] = "zone/addNewZone";

$route['addNewZones'] = "zone/addNewZones";

$route['editOldZone/(:num)'] = "zone/editOldZone/$1";

$route['editZone'] = "zone/editZone";

$route['deleteZone/(:num)'] = "zone/deleteZone/$1";



$route['addAttachZoneType'] = "zone/addAttachZoneType";

$route['addAttachZoneTypes'] = "zone/addAttachZoneTypes";

$route['editAttachZoneTypes/(:num)'] = "zone/editAttachZoneTypes/$1";

$route['editAttachZoneType'] = "zone/editAttachZoneType";





/***** Tax Master Start ****/



/*********** Master TAX CONTROLLER ROUTES *******************/

$route['taxs'] = "tax/taxs";

$route['addNewTax'] = "tax/addNewTax";

$route['addNewTaxs'] = "tax/addNewTaxs";

$route['editOldTax/(:num)'] = "tax/editOldTax/$1";

$route['editTax'] = "tax/editTax";

$route['deleteTax/(:num)'] = "tax/deleteTax/$1";



/*********** Master Guard Price CONTROLLER ROUTES *******************/

$route['addNewServiceTax'] = "tax/addNewServiceTax";

$route['addNewServiceTaxs'] = "tax/addNewServiceTaxs";

$route['editOldServiceTax/(:num)'] = "tax/editOldServiceTax/$1";

$route['editServiceTax'] = "tax/editServiceTax";

$route['deleteServiceTax/(:num)'] = "tax/deleteServiceTax/$1";



/*********** Master TAX CONTROLLER ROUTES *******************/

$route['gstTaxListing'] = "tax/gstTaxListing";

$route['addNewGstTax'] = "tax/addNewGstTax";

$route['addNewGstTaxs'] = "masttaxer/addNewGstTaxs";

$route['editOldGstTax/(:num)'] = "tax/editOldGstTax/$1";

$route['editGstTax'] = "tax/editGstTax";

$route['deleteGstTax/(:num)'] = "tax/deleteGstTax/$1";



/***** Tax Master End ****/





/*********** Master Guard CONTROLLER ROUTES *******************/

$route['guardListing'] = "master/guardListing";

$route['addNewGuard'] = "master/addNewGuard";

$route['addNewGuards'] = "master/addNewGuards";

$route['editOldGuard/(:num)'] = "master/editOldGuard/$1";

$route['editGuard'] = "master/editGuard";

$route['deleteGuard/(:num)'] = "master/deleteGuard/$1";



/*********** Master Guard Price CONTROLLER ROUTES *******************/

$route['addNewGuardPrice'] = "master/addNewGuardPrice";

$route['addNewGuardPrices'] = "master/addNewGuardPrices";

$route['editOldGuardPrice/(:num)'] = "master/editOldGuardPrice/$1";

$route['editGuardPrice'] = "master/editGuardPrice";

$route['deleteGuardPrice/(:num)'] = "master/deleteGuardPrice/$1";



/*********** Master Guard CONTROLLER ROUTES *******************/

$route['invoiceListing'] = "master/invoiceListing";

$route['addNewInvoice'] = "master/addNewInvoice";

$route['addNewInvoices'] = "master/addNewInvoices";

$route['editOldInvoice/(:num)'] = "master/editOldInvoice/$1";

$route['editInvoice'] = "master/editInvoice";

$route['deleteInvoice/(:num)'] = "master/deleteInvoice/$1";



$route['reports'] = 'master/reports';

$route['getAllReports'] = 'master/getAllReports';

$route['viewSearchRosterDetails'] = 'master/viewSearchRosterDetails';

$route['viewSearchRosterDetailsAll'] = 'master/viewSearchRosterDetailsAll';

$route['viewCompanyWiseRoster'] = 'master/viewCompanyWiseRoster';

$route['viewCompanyWiseRosterAll'] = 'master/viewCompanyWiseRosterAll';

$route['vehicleReports'] = 'master/vehicleReports';

$route['viewVehicleReport/(:num)'] = 'master/viewVehicleReport/$1';



/*********** USER CONTROLLER ROUTES *******************/

$route['loadChangePass'] = "user/loadChangePass";

$route['changePassword'] = "user/changePassword";

$route['pageNotFound'] = "user/pageNotFound";

$route['checkEmailExists'] = "user/checkEmailExists";

$route['endTask/(:num)'] = "user/endTask/$1";

$route['etasks'] = "user/etasks";

$route['userEdit'] = "user/loadUserEdit";

$route['updateUser'] = "user/updateUser";





/*********** LOGIN CONTROLLER ROUTES *******************/

$route['forgotPassword'] = "login/forgotPassword";

$route['resetPasswordUser'] = "login/resetPasswordUser";

$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";

$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";

$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";

$route['createPasswordUser'] = "login/createPasswordUser";



/* End of file routes.php */



/*********** Traveling Vehicle Type *******************/

$route['travelingTypesListing'] = 'traveling/travelingTypesListing';

$route['addNewTravelingType'] = "traveling/addNewTravelingType";

$route['addNewTravelingTypes'] = "traveling/addNewTravelingTypes";

$route['editOldTravelingType'] = "traveling/editOldTravelingType";

$route['editOldTravelingType/(:num)'] = "traveling/editOldTravelingType/$1";

$route['editTravelingType'] = "traveling/editTravelingType";

$route['deleteTravelingType'] = "traveling/deleteTravelingType";



/*********** Traveling Vehicle ******************/

$route['travelingVehiclesListing'] = 'traveling/travelingVehiclesListing';

$route['addNewTravelingVehicle'] = "traveling/addNewTravelingVehicle";

$route['addNewTravelingVehicles'] = "traveling/addNewTravelingVehicles";

$route['editOldTravelingVehicle'] = "traveling/editOldTravelingVehicle";

$route['editOldTravelingVehicle/(:num)'] = "traveling/editOldTravelingVehicle/$1";

$route['editTravelingVehicle'] = "traveling/editTravelingVehicle";

$route['deleteTravelingVehicle'] = "traveling/deleteTravelingVehicle";



/*********** Traveling Package *******************/

$route['travelingPackagesListing'] = 'traveling/travelingPackagesListing';

$route['addNewTravelingPackage'] = "traveling/addNewTravelingPackage";

$route['addNewTravelingPackages'] = "traveling/addNewTravelingPackages";

$route['editOldTravelingPackage'] = "traveling/editOldTravelingPackage";

$route['editOldTravelingPackage/(:num)'] = "traveling/editOldTravelingPackage/$1";

$route['editTravelingPackage'] = "traveling/editTravelingPackage";

$route['deleteTravelingPackage'] = "traveling/deleteTravelingPackage";



$route['cabListing'] = 'vehicle/cabListing';

$route['addNewCab'] = "vehicle/addNewCab";

$route['addNewCabs'] = "vehicle/addNewCabs";

$route['editOldCab/(:num)'] = "vehicle/editOldCab/$1";

$route['editCab'] = "vehicle/editCab";

$route['deleteCab'] = "vehicle/deleteCab";



$route['addMinAmount'] = "vehicle/addMinAmount";

$route['addMinAmounts'] = "vehicle/addMinAmounts";

$route['editOldMinAmount/(:num)'] = "vehicle/editOldMinAmount/$1";

$route['editMinAmount'] = "vehicle/editMinAmount";





/*********** Coupon CONTROLLER ROUTES *******************/

$route['couponListings'] = "coupon/couponListings";

$route['addNewCoupon'] = "coupon/addNewCoupon";

$route['addNewCoupons'] = "coupon/addNewCoupons";

$route['editOldCoupon/(:num)'] = "coupon/editOldCoupon/$1";

$route['editCoupon'] = "coupon/editCoupon";

$route['deleteCoupon'] = "coupon/deleteCoupon";





$route['editHome'] = "pages/editHome";

$route['editHomes'] = "pages/editHomes";



$route['offers'] = "offers/offers";

$route['addNewOffer'] = "offers/addNewOffer";

$route['addNewOffers'] = "offers/addNewOffers";

$route['editOffer'] = "offers/editOffer";

$route['deleteOffer/(:num)'] = "offers/deleteOffer/$1";

$route['editOldOffer/(:num)'] = "offers/editOldOffer/$1";



$route['blogs'] = "blogs/blogs";

$route['addNewblog'] = "blogs/addNewblog";

$route['addNewblogs'] = "blogs/addNewblogs";

$route['editBlogs/(:num)'] = "blogs/editBlogs/$1";

$route['deleteblogs/(:num)'] = "blogs/deleteblogs/$1";

$route['blogs/edit/(:num)'] = "blogs/edit/$1";



$route['quotation'] = "quotation/quotation";



$route['orders'] = "orders/orders";

$route['order_details/(:any)'] = "orders/order_details/$1";

$route['sendOrderEmail'] = "orders/sendOrderEmail";

$route['sendOrderMessage'] = "orders/sendOrderMessage";



$route['editPage/(:any)'] = "pages/editPage/$1";

$route['editPages'] = "pages/editPages";



$route['apply_coupon'] = 'payment/apply_coupon';

$route['bookrentalcar'] = 'quotation/bookrentalcar';

$route['bookoutstationcar'] = 'quotation/bookoutstationcar';

$route['bookairportcar'] = 'quotation/bookairportcar';





/* Location: ./application/config/routes.php */



// Coded by surya (005surya@gmail.com)
$route['download-order'] = 'orders/download_order';

// Coded by surya (005surya@gmail.com)