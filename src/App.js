import { useRoutes } from "react-router-dom";
import "./App.css";
import Home from "./Pages/Home";
import CabListing from "./Pages/CabListing";
import CabDetails from "./Pages/CabDetails";
import Contactus from "./Pages/Contactus";
import Faq from "./Pages/Faq";
import NotFoundPage from "./Components/Common/NotFoundPage";
import PrivacyPolicy from "./Pages/Other/PrivacyPolicy";
import TermsAndCondition from "./Pages/Other/TermsAndCondition";
import RefundPolicy from "./Pages/Other/RefundPolicy";
import Service from "./Pages/Services/Service";
import About from "./Pages/About";
import Outstation from "./Pages/Services/Outstation";
import Airport from "./Pages/Services/Airport";
import Corporate from "./Pages/Services/Corporate";
import Payment from "./Pages/Payment";
import Blogs from "./Pages/Blogs";

function App() {

  const routes = useRoutes([
    { path: "/", element: <Home /> },
    { path: "/blogs", element: <Blogs /> },
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
