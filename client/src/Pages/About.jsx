import { useEffect } from "react";
import AboutUsContent from "../Components/AboutUs/AboutUsContent";
import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";
// import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import ServiceComponent from "../Components/Cab/Service/ServiceComponent";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";
import { Helmet } from "react-helmet";
import AboutUsContent2 from "../Components/AboutUs/AboutUsContent2";

const About = () => {
  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);
  return (
    <>
      <Helmet>
        <title>Online Cab Booking, Tour and Travels Agency in Gurgaon </title>
        <meta
          name="description"
          content=" Sewak Travels is India's premier car rentals offering reliable & safe cabs and taxi. We offer Oneways, OutStation Roundtrips, Hourly Rentals, Employee Transportation & Airport Transfer."
        />
        <meta name="keywords" content=" " />
  <link rel="canonical" href="https://sewaktravels.com/about" />

      </Helmet>

      <Layout title="light_header" userBgClass="user user-light" />
      <AboutUsContent />
      <AboutUsContent2 />
      <ServicesComponent />
      {/* <OurTeamContent/> */}
      {/* <ServiceComponent /> */}
      {/* <ChooseUs/> */}
      {/* <Testimonials /> */}
      {/* <Instagram/> */}
      <FooterComponent />
    </>
  );
};

export default About;
