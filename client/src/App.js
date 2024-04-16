import { BrowserRouter, Route, Routes } from "react-router-dom";
import "./App.css";

import { Suspense, lazy, useEffect, useState } from "react";
import Loader from "./Layout/Loader";
import Intercity from "./Pages/Services/Intercity";
import { dataAgra, dataAyodhya, dataBangalore, dataBasti, dataBathinda, dataBijnor, dataChandigarh, dataCoimbatore, dataDehradun, dataGorakhpur, dataGuwahati, dataHaridwar, dataHyderabad, dataJaipur, dataKanpur, dataKasauli, dataKasol, dataKatra, dataKolkata, dataKullu, dataLucknow, dataLudhiana, dataManali, dataMathura, dataMcLeodganj, dataMeerut, dataMumbai, dataPatna, dataPune, dataRameshwaram, dataRishikesh, dataRoorkee, dataShimla, dataVisakhapatnam, dataVrindavan } from "./Pages/SourceToDestination";

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

           {/* 15 Locations  */}

          <Route
            path={"/cab/delhi-to-agra-cabs"}
            element={<CabListing1 destination={"Agra, Uttar Pradesh, India"} blogdata={dataAgra} />}
          />
          <Route
            path={"/cab/delhi-to-jaipur-cabs"}
            element={<CabListing1 destination={"Jaipur, Rajasthan, India"} blogdata={dataJaipur}/>}
          />
          <Route
            path={"/cab/delhi-to-chandigarh-cabs"}
            element={<CabListing1 destination={"Chandigarh, India"} blogdata={dataChandigarh}/>}
          />
          <Route
            path={"/cab/delhi-to-dehradun-cabs"}
            element={
              <CabListing1 destination={"Dehradun, Uttarakhand, India"} blogdata={dataDehradun}/>
            }
          />
          <Route
            path={"/cab/delhi-to-haridwar-cabs"}
            element={
              <CabListing1 destination={"Haridwar, Uttarakhand, India"} blogdata={dataHaridwar}/>
            }
          />
          <Route
            path={"/cab/delhi-to-rishikesh-cabs"}
            element={
              <CabListing1 destination={"Rishikesh, Uttarakhand, India"} blogdata={dataRishikesh}/>
            }
          />
          <Route
            path={"/cab/delhi-to-manali-cabs"}
            element={
              <CabListing1 destination={"Manali, Himachal Pradesh, India"} blogdata={dataManali}/>
            }
          />
          <Route
            path={"/cab/delhi-to-shimla-cabs"}
            element={
              <CabListing1 destination={"Shimla, Himachal Pradesh, India"} blogdata={dataShimla}/>
            }
          />
          <Route
            path={"/cab/delhi-to-kasol-cabs"}
            element={
              <CabListing1 destination={"Kasol, Himachal Pradesh, India"} blogdata={dataKasol}/>
            }
          />
          <Route
            path={"/cab/delhi-to-kasauli-cabs"}
            element={
              <CabListing1 destination={"Kasauli, Himachal Pradesh, India"} blogdata={dataKasauli}/>
            }
          />
          <Route
            path={"/cab/delhi-to-mcleodganj-cabs"}
            element={
              <CabListing1
                destination={
                  "McLeod Ganj, Dharamshala, Himachal Pradesh, India"
                } blogdata={dataMcLeodganj}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kullu-cabs"}
            element={
              <CabListing1 destination={"Kullu, Himachal Pradesh, India"} blogdata={dataKullu}/>
            }
          />
          <Route
            path={"/cab/delhi-to-mathura-cabs"}
            element={
              <CabListing1 destination={"Mathura, Uttar Pradesh, India"} blogdata={dataMathura}/>
            }
          />
          <Route
            path={"/cab/delhi-to-vrindavan-cabs"}
            element={
              <CabListing1 destination={"Vrindavan, Uttar Pradesh, India"} blogdata={dataVrindavan}/>
            }
          />
          <Route
            path={"/cab/delhi-to-bijnor-cabs"}
            element={
              <CabListing1 destination={"Bijnor, Uttar Pradesh, India"} blogdata={dataBijnor}/>
            }
          />

          {/* 20 locations */}

          <Route
            path={"/cab/delhi-to-bareilly-cabs"}
            element={<CabListing1 destination={"Bareilly, Uttar Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-auli-cabs"}
            element={<CabListing1 destination={"Auli Laga Salude, Uttarakhand, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-haldwani-cabs"}
            element={<CabListing1 destination={"Haldwani, Uttarakhand, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-moradabad-cabs"}
            element={<CabListing1 destination={"Moradabad, Uttar Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-varanasi-cabs"}
            element={<CabListing1 destination={"Varanasi, Uttar Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-ambala-cabs"}
            element={<CabListing1 destination={"Ambala, Haryana, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-mohali-cabs"}
            element={<CabListing1 destination={"Mohali, Punjab, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-batala-cabs"}
            element={<CabListing1 destination={"Batala, Punjab, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-dharamshala-cabs"}
            element={<CabListing1 destination={"Dharamshala, Himachal Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-mussoorie-cabs"}
            element={<CabListing1 destination={"Mussoorie, Uttarakhand, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-jalandhar-cabs"}
            element={<CabListing1 destination={"Jalandhar, Punjab, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-srinagar-cabs"}
            element={<CabListing1 destination={"Srinagar, Jammu and Kashmir, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-dalhousie-cabs"}
            element={<CabListing1 destination={"Dalhousie, Himachal Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-amritsar-cabs"}
            element={<CabListing1 destination={"Amritsar, Punjab, India"} />}
          />
          <Route
            path={"/cab/delhi-to-udaipur-cabs"}
            element={<CabListing1 destination={"Udaipur, Rajasthan, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-nainital-cabs"}
            element={<CabListing1 destination={"Nainital, Uttarakhand, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-karnal-cabs"}
            element={<CabListing1 destination={"Karnal, Haryana, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-alwar-cabs"}
            element={<CabListing1 destination={"Alwar, Rajasthan, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-gwalior-cabs"}
            element={<CabListing1 destination={"Gwalior, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-jodhpur-cabs"}
            element={<CabListing1 destination={"Jodhpur, Rajasthan, India"}/>}
          />

           {/* 50 locations */}

          <Route
            path={"/cab/delhi-to-lucknow-cabs"}
            element={<CabListing1 destination={"Lucknow, Uttar Pradesh, India"} blogdata={dataLucknow}/>}
          />
          <Route
            path={"/cab/delhi-to-ludhiana-cabs"}
            element={<CabListing1 destination={"Ludhiana, Punjab, India"} blogdata={dataLudhiana}/>}
          />
           <Route
            path={"/cab/delhi-to-kanpur-cabs"}
            element={<CabListing1 destination={"Kanpur, Uttar Pradesh, India"} blogdata={dataKanpur}/>}
          />
           <Route
            path={"/cab/delhi-to-meerut-cabs"}
            element={<CabListing1 destination={"Meerut, Uttar Pradesh, India"} blogdata={dataMeerut}/>}
          />
           <Route
            path={"/cab/delhi-to-roorkee-cabs"}
            element={<CabListing1 destination={"Roorkee, Uttarakhand, India"} blogdata={dataRoorkee}/>}
          />
           <Route
            path={"/cab/delhi-to-patna-cabs"}
            element={<CabListing1 destination={"Patna, Bihar, India"} blogdata={dataPatna}/>}
          />
           <Route
            path={"/cab/delhi-to-ayodhya-cabs"}
            element={<CabListing1 destination={"Ayodhya, Uttar Pradesh, India"} blogdata={dataAyodhya}/>}
          />
           <Route
            path={"/cab/delhi-to-gorakhpur-cabs"}
            element={<CabListing1 destination={"Gorakhpur, Uttar Pradesh, India"} blogdata={dataGorakhpur}/>}
          />
          <Route
            path={"/cab/delhi-to-basti-cabs"}
            element={<CabListing1 destination={"Basti, Uttar Pradesh, India"} blogdata={dataBasti}/>}
          />
          <Route
            path={"/cab/delhi-to-pune-cabs"}
            element={<CabListing1 destination={"Pune, Maharashtra, India"} blogdata={dataPune}/>}
          />
          <Route
            path={"/cab/delhi-to-katra-cabs"}
            element={<CabListing1 destination={"Katra, Jammu and Kashmir, India"} blogdata={dataKatra}/>}
          />
          <Route
            path={"/cab/delhi-to-mumbai-cabs"}
            element={<CabListing1 destination={"Mumbai, Maharashtra, India"} blogdata={dataMumbai}/>}
          />
          <Route
            path={"/cab/delhi-to-kolkata-cabs"}
            element={<CabListing1 destination={"Kolkata, West Bengal, India"} blogdata={dataKolkata}/>}
          />
          <Route
            path={"/cab/delhi-to-hyderabad-cabs"}
            element={<CabListing1 destination={"Hyderabad, Telangana, India"} blogdata={dataHyderabad}/>}
          />
          <Route
            path={"/cab/delhi-to-coimbatore-cabs"}
            element={<CabListing1 destination={"Coimbatore, Tamil Nadu, India"} blogdata={dataCoimbatore}/>}
          />
          <Route
            path={"/cab/delhi-to-visakhapatnam-cabs"}
            element={<CabListing1 destination={"Visakhapatnam, Andhra Pradesh, India"} blogdata={dataVisakhapatnam}/>}
          />
          <Route
            path={"/cab/delhi-to-rameshwaram-cabs"}
            element={<CabListing1 destination={"Rameshwaram, Tamil Nadu, India"} blogdata={dataRameshwaram}/>}
          />
          <Route
            path={"/cab/delhi-to-bangalore-cabs"}
            element={<CabListing1 destination={"Bangalore, Karnataka, India"} blogdata={dataBangalore}/>}
          />
          <Route
            path={"/cab/delhi-to-guwahati-cabs"}
            element={<CabListing1 destination={"Guwahati, Assam, India"} blogdata={dataGuwahati}/>}
          />
          <Route
            path={"/cab/delhi-to-bathinda-cabs"}
            element={<CabListing1 destination={"Bathinda, Punjab, India"} blogdata={dataBathinda}/>}
          />
          <Route
            path={"/cab/delhi-to-chhindwara-cabs"}
            element={<CabListing1 destination={"Chhindwara, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-muzaffarpur-cabs"}
            element={<CabListing1 destination={"Muzaffarpur, Bihar, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-ranchi-cabs"}
            element={<CabListing1 destination={"Ranchi, Jharkhand, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-bihar-sharif-cabs"}
            element={<CabListing1 destination={"Bihar Sharif, Bihar, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-raipur-cabs"}
            element={<CabListing1 destination={"Raipur, Chhattisgarh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-akola-cabs"}
            element={<CabListing1 destination={"Akola, Maharashtra, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-ramachandrapuram-cabs"}
            element={<CabListing1 destination={"Ramachandrapuram, Andhra Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-katraj-cabs"}
            element={<CabListing1 destination={"Katraj, Pune, Maharashtra, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-rajkot-cabs"}
            element={<CabListing1 destination={"Rajkot, Gujarat, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-surat-cabs"}
            element={<CabListing1 destination={"Surat, Gujarat, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-jabalpur-cabs"}
            element={<CabListing1 destination={"Jabalpur, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-ujjain-cabs"}
            element={<CabListing1 destination={"Ujjain, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-ratlam-cabs"}
            element={<CabListing1 destination={"Ratlam, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-gandhinagar-cabs"}
            element={<CabListing1 destination={"Gandhinagar, Gujarat, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-sanand-cabs"}
            element={<CabListing1 destination={"Sanand, Gujarat, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-jamnagar-cabs"}
            element={<CabListing1 destination={"Jamnagar, Gujarat, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-pithampur-cabs"}
            element={<CabListing1 destination={"Pithampur, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-indore-cabs"}
            element={<CabListing1 destination={"Indore, Madhya Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-allahabad-cabs"}
            element={<CabListing1 destination={"Allahabad, Uttar Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-hoshangabad-cabs"}
            element={<CabListing1 destination={"Hoshangabad, Madhya Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-Unnatnagar-cabs"}
            element={<CabListing1 destination={"Unnat Nagar, Goregaon West, Mumbai, Maharashtra, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-ahmedabad-cabs"}
            element={<CabListing1 destination={"Ahmedabad, Gujarat, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-dwarka-cabs"}
            element={<CabListing1 destination={"Dwarka, Gujarat, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-naini-cabs"}
            element={<CabListing1 destination={"Naini, Prayagraj, Uttar Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-raisen-cabs"}
            element={<CabListing1 destination={"Raisen, Madhya Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-samastipur-cabs"}
            element={<CabListing1 destination={"Samastipur, Bihar, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-vadodara-cabs"}
            element={<CabListing1 destination={"Vadodara, Gujarat, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-bilaspur-cabs"}
            element={<CabListing1 destination={"Bilaspur, Chhattisgarh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-faridabad-cabs"}
            element={<CabListing1 destination={"Faridabad, Haryana, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-noida-cabs"}
            element={<CabListing1 destination={"Noida, Uttar Pradesh, India"}/>}
          />

          {/* New locations */}

          <Route
            path={"/cab/delhi-to-murthal-cabs"}
            element={<CabListing1 destination={"Murthal, Haryana, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-hapur-cabs"}
            element={<CabListing1 destination={"Hapur, Uttar Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-palwal-cabs"}
            element={<CabListing1 destination={"Palwal, Haryana, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-baraut-cabs"}
            element={<CabListing1 destination={"Baraut, Uttar Pradesh, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-neemrana-cabs"}
            element={<CabListing1 destination={"Neemrana, Rajasthan, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-bhiwadi-cabs"}
            element={<CabListing1 destination={"Bhiwadi, Rajasthan, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-sonipat-cabs"}
            element={<CabListing1 destination={"Sonipat, Haryana, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-jhajjar-cabs"}
            element={<CabListing1 destination={"Jhajjar, Haryana, India"}/>}
          />
          <Route
            path={"/cab/delhi-to-rohtak-cabs"}
            element={<CabListing1 destination={"Rohtak, Haryana, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-sahibabad-cabs"}
            element={<CabListing1 destination={"Sahibabad, Ghaziabad, Uttar Pradesh, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-firozpur-jhirka-cabs"}
            element={<CabListing1 destination={"Firozpur Jhirka, Haryana, India"}/>}
          />
           <Route
            path={"/cab/delhi-to-jim-corbett-cabs"}
            element={<CabListing1 destination={"Jim Corbett, Halduchaur, Uttarakhand, India"}/>}
          />

          <Route path={"/*"} element={<Home />} />
        </Routes>
      </Suspense>
    </BrowserRouter>
  );
}

export default App;
