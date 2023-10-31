import { useEffect } from "react";
import Layout from "../Layout/Layout";
import MainBooking from "../Components/Booking/MainBooking";

function Booking(){
    useEffect(() => {
      document.documentElement.style.setProperty("--theme-color1", "233, 179, 14");
      document.documentElement.style.setProperty("--theme-color2", "239, 63, 62");
  
      return () => {
        document.documentElement.style.setProperty("--theme-color1","239, 63, 62");
        document.documentElement.style.setProperty("--theme-color2","0, 162, 247");
      };
    }, []);
    return (
        <>
        <Layout title="light_header" />
        <MainBooking />
        </>

      
    );
  };
  
  export default Booking;