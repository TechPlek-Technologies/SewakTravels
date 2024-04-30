import CallService from "../Components/Cab/Home/CallService";
// import FactsContent from "../Components/Cab/Home/FactsContent/FactsContent";
import NewHomeBanner from "../Components/Cab/Home/NewHomeBanner";
import ServicesComponent from "../Components/Cab/Home/Service/ServicesComponent";
import Testimonials from "../Components/Cab/Home/Testimonials/Testimonials";
import Video from "../Components/Cab/Home/VideoComponent/Video";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";
import VideoBanner from "../Components/Cab/Home/VideoBanner";
import FullBanner from "../Components/Cab/Home/FullBanner";
import Package from "../Components/Cab/Home/Offers/Package";
import { useState } from "react";
import { useCallback } from "react";
import ExplorePackages from "../Components/TourPackage/ExplorePackages";
import Airline from "../Components/FlightPackage/Airline";
import ImportantLinks from "../Components/Common/ImportantLinks";
import OfferComponent from "../Components/HotelPackage/OfferComponent";
import { Helmet } from "react-helmet";
// import FactsContent1 from "../Components/Cab/Home/FactsContent/FactsContent1";
import FactsContent2 from "../Components/Cab/Home/FactsContent/FactsContent2";
import CabFrom from "../Components/Cab/Home/CabFrom";

function Home() {
  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback((tab) => {
    setActiveTab(tab);
  }, []);

  return (
    <div className="home-bg">
    <>
      <Layout title="overlay1-white" />
      <Helmet>
      <title> Sewak Travels: Travel Website for Booking Hotels, Flights, Cabs. </title>
        <meta
          name="description"
          content=" Get best deals on all your online travel bookings. Book Online flights, hotels, cabs & Taxi services. Make your travel dreams a reality with Sewak Travels!"
        />
        <meta
          name="keywords"
          content=" India travel, travel in India, cheap air tickets, cheap flights, flight, hotels, hotel, holidays, air travel, air tickets, holiday packages, travel packages, online booking, cab services, taxi services, online cab booking, car rental in delhi with driver, book car rental online, cab service in delhi ncr, sewak travels"
          
        />
        <link rel="canonical" href="https://sewaktravels.com/" />
      </Helmet>

      <NewHomeBanner activeTab={activeTab} callback={callback} />
      {/* <OurVehicleOffers/> */}
      {/* <TopCategory titleClass="top-category margin-cls radius-cls" /> */}
      {/* <FleetCars/> */}
      {/* <CabOffers/> */}
      {/* <CabGallery /> */}
      {activeTab === "1" && <Package type="Cab Offers" />}
      {activeTab === "2" && <Airline type="Flight Offers" />}
      {activeTab === "3" && <OfferComponent type="Hotel Offers" />}
      {activeTab === "4" && <ExplorePackages type="Tour Offers" />}
      {activeTab === "4" && <ImportantLinks />}
      {<VideoBanner />}
      {activeTab === "1" && <CabFrom />}
      {<FactsContent2/>}
      {<Testimonials />}
      {activeTab === "1" && <FullBanner />}
      {<ServicesComponent />}
      {<Video />}
      {<CallService />}
      {/* <Instagram /> */}
      {<FooterComponent />}
    </>
    </div>
  );
}

export default Home;
