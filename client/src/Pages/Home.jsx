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
import FactsContent2 from "../Components/Cab/Home/FactsContent/FactsContent2";
import VideoBanner1 from "../Components/Cab/Home/VideoBanner1";
import HomePopUp from "../Components/Cab/Home/HomePopUp";
import HomeBanner1 from "../Components/Cab/Home/HomeBanner1";

function Home() {
  const [activeTab, setActiveTab] = useState("1");
  const callback = useCallback((tab) => {
    setActiveTab(tab);
  }, []);
  const [isPopupOpen, setIsPopOpen] = useState(false);
  const [phone_email, setPhone_email] = useState(null);
  const handlePopupClose = () => {
    setIsPopOpen(!isPopupOpen);
  };

  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const [startDate, setStartDate] = useState(new Date(tomorrow));
  const [returnDate, setReturnDate] = useState(new Date(dayAfterTomorrow));

  const [startTime, setStartTime] = useState("12:00 PM");
  const [returnTime, setReturnTime] = useState("12:00 PM");

  const [selectedValue, setSelectedValue] = useState("Outstation One-Way");

  const [source, setSource] = useState("Delhi, India");
  const [destination, setDestination] = useState("Chandigarh, India");

  const [rentals, setRentals] = useState("4hrs40km");

  const pathParams = {
    source: source,
    destination: destination,
    selectedValue: selectedValue,
    startDate: startDate,
    returnDate: returnDate,
    startTime: startTime,
    returnTime: returnTime,
    rentalPackage: rentals,
    email_phone: phone_email,
  };

  return (
    <div className="home-bg">
      <>
        <Layout title="overlay1-white" />
        <Helmet>
          <title>
            {" "}
            Sewak Travels: Travel Website for Booking Hotels, Flights, Cabs.{" "}
          </title>
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

        {/* <NewHomeBanner
          pathParams={pathParams}
          activeTab={activeTab}
          callback={callback}
          handlePopupClose={handlePopupClose}
          phone_email={phone_email}
          isPopupOpen={isPopupOpen}
          setStartDate={setStartDate}
          setReturnDate={setReturnDate}
          setStartTime={setStartTime}
          setReturnTime={setReturnTime}
          setSelectedValue={setSelectedValue}
          setSource={setSource}
          setDestination={setDestination}
          setRentals={setRentals}
        /> */}

        <HomeBanner1
           pathParams={pathParams}
           activeTab={activeTab}
           callback={callback}
           handlePopupClose={handlePopupClose}
           phone_email={phone_email}
           isPopupOpen={isPopupOpen}
           setStartDate={setStartDate}
           setReturnDate={setReturnDate}
           setStartTime={setStartTime}
           setReturnTime={setReturnTime}
           setSelectedValue={setSelectedValue}
           setSource={setSource}
           setDestination={setDestination}
           setRentals={setRentals}
        />

        <HomePopUp
          pathParams={pathParams}
          handlePopupClose={handlePopupClose}
          phone_email={phone_email}
          setPhone_email={setPhone_email}
          isPopupOpen={isPopupOpen}
        />

        {activeTab === "1" && <Package type="Cab Offers" />}
        {activeTab === "2" && <Airline type="Flight Offers" />}
        {activeTab === "3" && <OfferComponent type="Hotel Offers" />}
        {activeTab === "4" && <ExplorePackages type="Tour Offers" />}
        {activeTab === "4" && <ImportantLinks />}
        {activeTab === "1" && <VideoBanner1 />}
        {<FactsContent2 />}
        {<Testimonials />}
        {activeTab === "1" && <FullBanner />}
        {<ServicesComponent />}
        {<Video />}
        {<CallService />}
        {<FooterComponent />}
      </>
    </div>
  );
}

export default Home;
