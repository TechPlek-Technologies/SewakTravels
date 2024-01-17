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


const fetchData = async () => {
  try {
    const result = (await axios.get(`https://new.sewaktravels.com/blogsData`)).data;
    return result;
  } catch (err) {
    console.log(err);
    throw err; // Rethrow the error so it can be caught in the component
  }
};


function App() {
  const [blogsData, setBlogsData] = useState([]);

  useEffect(() => {
    const fetchBlogsData = async () => {
      try {
        const data = await fetchData();
        setBlogsData(data.blogs);
      } catch (error) {
        // Handle error, e.g., show an error message
        console.error('Error fetching data:', error);
      }
    };

    fetchBlogsData();
  }, []); // Empty dependency array means this effect runs only once when the component mounts

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
            <Route path={"/blogs"} element={<Blogs blogsData={blogsData} />} />
            <Route path={"/blogs/:id"} element={<BlogDetails blogsData={blogsData} />} />
            <Route path={"/service"} element={<Service />} />
            <Route path={"/outstation-cab-taxi-service"} element={<Outstation />} />
            <Route path={"/airport-cab-taxi-transport-service"} element={<Airport />} />
            <Route path={"/employee-cab-taxi-transport-service"} element={<Corporate />} />
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
