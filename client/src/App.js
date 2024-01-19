import { BrowserRouter, Route, Routes } from "react-router-dom";
import "./App.css";


import { Suspense, lazy, useEffect, useState } from "react";
import Img from "./Components/Common/Img";
import Loader from "./Layout/Loader";
import axios from "axios";


const Home = lazy(() => import("./Pages/Home"));

const CabListing = lazy(() => import("./Pages/CabListing"));

const CabDetails = lazy(() => import("./Pages/CabDetails"));

const Contactus = lazy(() => import("./Pages/Contactus"));

const Faq = lazy(() => import("./Pages/Faq"));

const NotFoundPage = lazy(() => import("./Components/Common/NotFoundPage"));

const PrivacyPolicy = lazy(() => import("./Pages/Other/PrivacyPolicy"));

const TermsAndCondition = lazy(() => import("./Pages/Other/TermsAndCondition"));

const RefundPolicy = lazy(() => import("./Pages/Other/RefundPolicy"));

const Service = lazy(() => import("./Pages/Services/Service"));

const About = lazy(() => import("./Pages/About"));

const Outstation = lazy(() => import("./Pages/Services/Outstation"));

const Airport = lazy(() => import("./Pages/Services/Airport"));

const Corporate = lazy(() => import("./Pages/Services/Corporate"));

const Payment = lazy(() => import("./Pages/Payment"));

const Blogs = lazy(() => import("./Pages/Blogs"));

const BlogDetails = lazy(() => import("./Pages/BlogDetails/BlogDetails"));





function App() {
  

  return (
    <BrowserRouter>
        <Suspense
          fallback={
            
              <Loader loaderTimeout={1000}/>
             
          }
        >
          <Routes>
            <Route path={"/"} element={<Home />} />
            <Route path={"/contact"} element={<Contactus />} />
            <Route path={"/about"} element={<About />} />
            <Route path={"/blogs"} element={<Blogs />} />
            <Route path={"/blogs/:blog_title"} element={<BlogDetails />} />
            <Route path={"/service"} element={<Service />} />
            <Route path={"/outstation-cab-taxi-service"} element={<Outstation />} />
            <Route path={"/airport-cab-taxi-transport-service"} element={<Airport />} />
            <Route path={"/employee-cab-taxi-transport-service"} element={<Corporate />} />
            <Route path={"/cab/listing/:source/:destination"} element={<CabListing />} />
            <Route path={"/journey-details/:id"} element={<CabDetails />} />
            <Route path={"/FAQ"} element={<Faq />} />
            <Route path={"/payment/:transactionId?"} element={<Payment />} />
            <Route path={"/terms-and-conditions"} element={<TermsAndCondition />} />
            <Route path={"/refund-policy"} element={<RefundPolicy />} />
            <Route path={"/privacy-policy"} element={<PrivacyPolicy/>} />
            <Route path={"/*"} element={<NotFoundPage/>} />
          </Routes>
        </Suspense>
    </BrowserRouter>
  );
}

export default App;
