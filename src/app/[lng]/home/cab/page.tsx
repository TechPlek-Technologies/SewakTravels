"use client";
import { FC } from "react";
import CustomLayout from "@/layouts/layout";
import HomeBanner from "@/components/home/cab/modern/home-banner";
import { ApplicationContextProvider } from "@/context/CabContext";



const Modern: FC = () => {
  return (
    <CustomLayout coupon={true} userBgClass="user user-light rounded5">
      <ApplicationContextProvider>
        <HomeBanner/>
      </ApplicationContextProvider>

      
     
    </CustomLayout>
  );
};

export default Modern;
