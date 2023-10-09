import { FC } from "react";
import CustomLayout from "@/layouts/layout";
// import "@/public/assets/scss/color1.scss";
//import HomeBanner from "@/components/home/cab/modern/home-banner";
import TermsAndCondition from "@/components/myComponents/termscomponent";


const Modern: FC = () => {
  return (
    <CustomLayout coupon={true} userBgClass="user user-light rounded5">
     <TermsAndCondition/>
    </CustomLayout>
  
  
  );


};

export default Modern;
