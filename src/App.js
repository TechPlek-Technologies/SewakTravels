import { useRoutes } from "react-router-dom";
import "./App.css";
import Home from "./Pages/Home";
import CabListing from "./Pages/CabListing";
// import Blogs from './Pages/Blogs';
// import BlogDetails1 from './Pages/BlogDetails/BlogDetails1';
import CabDetails from "./Pages/CabDetails";
import Contactus from "./Pages/Contactus";
import Faq from "./Pages/Faq";
import NotFoundPage from "./Components/Common/NotFoundPage";
import PrivacyPolicy from "./Pages/Other/PrivacyPolicy";
import TermsAndCondition from "./Pages/Other/TermsAndCondition";
import RefundPolicy from "./Pages/Other/RefundPolicy";
import Service from "./Pages/Services/Service";
import ComingSoon from "./Pages/ComingSoon";
import About from "./Pages/About";
import Outstation from "./Pages/Services/Outstation";
import Airport from "./Pages/Services/Airport";
import Corporate from "./Pages/Services/Corporate";
import { useState } from "react";
import PaymentSuccess from "./Pages/Payment";
import Payment from "./Pages/Payment";
import Flight from "./Pages/Flight";
import Hotel from "./Pages/Hotel";
import Tour from "./Pages/Tour";

function App() {
  // const tomorrow = new Date();
  // tomorrow.setDate(tomorrow.getDate() + 1);
  // const dayAfterTomorrow = new Date();
  // dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  // const [tabSelection,settabSelection]=useState("");
  // const [cabType,setCabType]= useState("Outstation One-Way")

  // const [source, setSource] = useState("");
  // const [destination, setDestination] = useState("");

  // const [startDate, setStartDate] = useState(new Date(tomorrow));
  // const [returnDate, setReturnDate] = useState(new Date(dayAfterTomorrow));

  // const [startTme, setStartTime] = useState("12:00 PM");
  // const [returnTime, setReturnTime] = useState("12:00 PM");

  // const [airportSelection, setAirportSelection] = useState("");

  const routes = useRoutes([
    { path: "/", element: <Home /> },
    { path: "/flight", element: <Flight /> },
    { path: "/hotel", element: <Hotel /> },
    { path: "/tour", element: <Tour /> },
    { path: "/blogs", element: <ComingSoon /> },
    // {path: '/blogs/:id', element: <BlogDetails1/>},
    { path: "/journey-details/:id", element: <CabDetails /> },
    { path: "/cab/listing/:source/:destination", element: <CabListing /> },
    { path: "/contact", element: <Contactus /> },
    { path: "/about", element: <About /> },
    { path: "/service", element: <Service /> },
    { path: "/service/outstation", element: <Outstation /> },
    { path: "/service/airport", element: <Airport /> },
    { path: "/service/corporate", element: <Corporate /> },
    { path: "/FAQ", element: <Faq /> },
    { path: "/privacy-policy", element: <PrivacyPolicy /> },
    { path: "/terms-and-conditon", element: <TermsAndCondition /> },
    { path: "/refund-policy", element: <RefundPolicy /> },
    { path: "/payment/:transactionId?", element: <Payment /> },
    { path: "/*", element: <NotFoundPage /> },
  ]);

  return routes;
}

export default App;
