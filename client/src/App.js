import { BrowserRouter, Route, Routes } from "react-router-dom";
import "./App.css";

import { Suspense, lazy, useEffect, useState } from "react";
import Img from "./Components/Common/Img";
import Loader from "./Layout/Loader";
import axios from "axios";
import Intercity from "./Pages/Services/Intercity";
import { dataAgra } from "./Pages/SourceToDestination";

const Home = lazy(() => import("./Pages/Home"));

const CabListing = lazy(() => import("./Pages/CabListing"));

const CabListing1 = lazy(() => import("./Pages/CabListing1"));

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
      <Suspense fallback={<Loader loaderTimeout={1000} />}>
        <Routes>
          <Route path={"/"} element={<Home />} />
          <Route path={"/contact"} element={<Contactus />} />
          <Route path={"/about"} element={<About />} />
          <Route path={"/blogs"} element={<Blogs />} />
          <Route path={"/blogs/:blog_title"} element={<BlogDetails />} />
          <Route path={"/service"} element={<Service />} />
          <Route
            path={"/outstation-cab-taxi-service"}
            element={<Outstation />}
          />
          <Route
            path={"/airport-cab-taxi-transport-service"}
            element={<Airport />}
          />
          <Route
            path={"/employee-cab-taxi-transport-service"}
            element={<Corporate />}
          />
          <Route path={"/intercity-cab-taxi-service"} element={<Intercity />} />
          <Route
            path={"/cab/listing/:source/:destination"}
            element={<CabListing />}
          />

          <Route path={"/journey-details/:id"} element={<CabDetails />} />
          <Route path={"/FAQ"} element={<Faq />} />
          <Route path={"/payment/:transactionId?"} element={<Payment />} />
          <Route
            path={"/terms-and-conditions"}
            element={<TermsAndCondition />}
          />
          <Route path={"/refund-policy"} element={<RefundPolicy />} />
          <Route path={"/privacy-policy"} element={<PrivacyPolicy />} />

          <Route
            path={"/cab/delhi-to-agra-cabs"}
            element={<CabListing1 destination={"Agra, Uttar Pradesh, India"} blogdata={dataAgra} />}
          />
          <Route
            path={"/cab/delhi-to-jaipur-cabs"}
            element={<CabListing1 destination={"Jaipur, Rajasthan, India"} />}
          />
          <Route
            path={"/cab/delhi-to-chandigarh-cabs"}
            element={<CabListing1 destination={"Chandigarh, India"} />}
          />
          <Route
            path={"/cab/delhi-to-dehradun-cabs"}
            element={
              <CabListing1 destination={"Dehradun, Uttarakhand, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-haridwar-cabs"}
            element={
              <CabListing1 destination={"Haridwar, Uttarakhand, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-rishikesh-cabs"}
            element={
              <CabListing1 destination={"Rishikesh, Uttarakhand, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-manali-cabs"}
            element={
              <CabListing1 destination={"Manali, Himachal Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-shimla-cabs"}
            element={
              <CabListing1 destination={"Shimla, Himachal Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-kasol-cabs"}
            element={
              <CabListing1 destination={"Kasol, Himachal Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-kasauli-cabs"}
            element={
              <CabListing1 destination={"Kasauli, Himachal Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-mcleodganj-cabs"}
            element={
              <CabListing1
                destination={
                  "McLeod Ganj, Dharamshala, Himachal Pradesh, India"
                }
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kullu-cabs"}
            element={
              <CabListing1 destination={"Kullu, Himachal Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-mathura-cabs"}
            element={
              <CabListing1 destination={"Mathura, Uttar Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-vrindavan-cabs"}
            element={
              <CabListing1 destination={"Vrindavan, Uttar Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-bijnor-cabs"}
            element={
              <CabListing1 destination={"Bijnor, Uttar Pradesh, India"} />
            }
          />
          <Route
            path={"/cab/delhi-to-bareilly-cabs"}
            element={<CabListing1 destination={"Bareilly, Uttar Pradesh, India"} />}
          />
           <Route
            path={"/cab/delhi-to-auli-cabs"}
            element={<CabListing1 destination={"Auli Laga Salude, Uttarakhand, India"} />}
          />
          <Route
            path={"/cab/delhi-to-haldwani-cabs"}
            element={<CabListing1 destination={"Haldwani, Uttarakhand, India"} />}
          />
          <Route
            path={"/cab/delhi-to-moradabad-cabs"}
            element={<CabListing1 destination={"Moradabad, Uttar Pradesh, India"} />}
          />
           <Route
            path={"/cab/delhi-to-varanasi-cabs"}
            element={<CabListing1 destination={"Varanasi, Uttar Pradesh, India"} />}
          />
           <Route
            path={"/cab/delhi-to-ambala-cabs"}
            element={<CabListing1 destination={"Ambala, Haryana, India"} />}
          />
          <Route
            path={"/cab/delhi-to-mohali-cabs"}
            element={<CabListing1 destination={"Mohali, Punjab, India"} />}
          />
          <Route
            path={"/cab/delhi-to-batala-cabs"}
            element={<CabListing1 destination={"Batala, Punjab, India"} />}
          />
          <Route
            path={"/cab/delhi-to-dharamshala-cabs"}
            element={<CabListing1 destination={"Dharamshala, Himachal Pradesh, India"} />}
          />
          <Route
            path={"/cab/delhi-to-mussoorie-cabs"}
            element={<CabListing1 destination={"Mussoorie, Uttarakhand, India"} />}
          />
          <Route
            path={"/cab/delhi-to-jalandhar-cabs"}
            element={<CabListing1 destination={"Jalandhar, Punjab, India"} />}
          />
          <Route
            path={"/cab/delhi-to-srinagar-cabs"}
            element={<CabListing1 destination={"Srinagar, Jammu and Kashmir, India"} />}
          />
          <Route
            path={"/cab/delhi-to-dalhousie-cabs"}
            element={<CabListing1 destination={"Dalhousie, Himachal Pradesh, India"} />}
          />
          <Route
            path={"/cab/delhi-to-amritsar-cabs"}
            element={<CabListing1 destination={"Amritsar, Punjab, India"} />}
          />
          <Route
            path={"/cab/delhi-to-udaipur-cabs"}
            element={<CabListing1 destination={"Udaipur, Rajasthan, India"} />}
          />
          <Route
            path={"/cab/delhi-to-nainital-cabs"}
            element={<CabListing1 destination={"Nainital, Uttarakhand, India"} />}
          />
          <Route
            path={"/cab/delhi-to-karnal-cabs"}
            element={<CabListing1 destination={"Karnal, Haryana, India"} />}
          />
          <Route
            path={"/cab/delhi-to-alwar-cabs"}
            element={<CabListing1 destination={"Alwar, Rajasthan, India"} />}
          />
          <Route
            path={"/cab/delhi-to-gwalior-cabs"}
            element={<CabListing1 destination={"Gwalior, Madhya Pradesh, India"} />}
          />
          <Route
            path={"/cab/delhi-to-jodhpur-cabs"}
            element={<CabListing1 destination={"Jodhpur, Rajasthan, India"} />}
          />
          <Route path={"/*"} element={<Home />} />
        </Routes>
      </Suspense>
    </BrowserRouter>
  );
}

export default App;
