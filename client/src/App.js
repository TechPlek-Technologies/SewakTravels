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

  const [blogsData, setBlogsData] = useState([]);

  // const targetId = param.id;

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = async () => {
    try {
      const result = (await axios.get(`https://sewaktravels.com:5000/blogsdata`)).data;

      console.log(result);
      setBlogsData(result);
    } catch (err) {
      console.log(err);
    }
  };

  


  return (
    <BrowserRouter>
        <Suspense
          fallback={
            
              <Loader loaderTimeout={5000}/>
             
          }
        >
          <Routes>
            <Route path={"/"} element={<Home />} />
            <Route path={"/contact"} element={<Contactus />} />
            <Route path={"/about"} element={<About />} />
            <Route path={"/blogs"} element={<Blogs blogsData={blogsData} />} />
            <Route path={"/blogs/:id"} element={<BlogDetails blogsData={blogsData} />} />
            <Route path={"/service"} element={<Service />} />
            <Route path={"/service/outstation"} element={<Outstation />} />
            <Route path={"/service/airport"} element={<Airport />} />
            <Route path={"/service/corporate"} element={<Corporate />} />
            <Route path={"/cab/listing/:source/:destination"} element={<CabListing />} />
            <Route path={"/journey-details/:id"} element={<CabDetails />} />
            <Route path={"/FAQ"} element={<Faq />} />
            <Route path={"/payment/:transactionId?"} element={<Payment />} />
            <Route path={"/terms-and-condition"} element={<TermsAndCondition />} />
            <Route path={"/refund-policy"} element={<RefundPolicy />} />
            <Route path={"/privacy-policy"} element={<PrivacyPolicy/>} />
            <Route path={"/*"} element={<NotFoundPage/>} />
          </Routes>
        </Suspense>
    </BrowserRouter>
  );
}

export default App;
