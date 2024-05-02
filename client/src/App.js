import { BrowserRouter, Route, Routes } from "react-router-dom";
import "./App.css";

import { Suspense, lazy, useEffect, useState } from "react";
import Loader from "./Layout/Loader";
import Intercity from "./Pages/Services/Intercity";
import {
  dataAgra,
  dataAhmedabad,
  dataAkola,
  dataAllahabad,
  dataAlwar,
  dataAmbala,
  dataAmritsar,
  dataAuli,
  dataAyodhya,
  dataBangalore,
  dataBareilly,
  dataBasti,
  dataBatala,
  dataBathinda,
  dataBiharSharif,
  dataBijnor,
  dataBilaspur,
  dataChandigarh,
  dataChhindwara,
  dataCoimbatore,
  dataDalhousie,
  dataDehradun,
  dataDharamshala,
  dataDwarka,
  dataFaridabad,
  dataGandhinagar,
  dataGorakhpur,
  dataGuwahati,
  dataGwalior,
  dataHaldwani,
  dataHaridwar,
  dataHoshangabad,
  dataHyderabad,
  dataIndore,
  dataItarsi,
  dataJabalpur,
  dataJaipur,
  dataJalandhar,
  dataJamnagar,
  dataJodhpur,
  dataKanpur,
  dataKarnal,
  dataKasauli,
  dataKasol,
  dataKatra,
  dataKatraj,
  dataKolkata,
  dataKullu,
  dataLucknow,
  dataLudhiana,
  dataManali,
  dataMathura,
  dataMcLeodganj,
  dataMeerut,
  dataMohali,
  dataMoradabad,
  dataMumbai,
  dataMussoorie,
  dataMuzaffarpur,
  dataNainital,
  dataNoida,
  dataPatna,
  dataPithampur,
  dataPune,
  dataRaipur,
  dataRaisen,
  dataRajkot,
  dataRamachandrapuram,
  dataRameshwaram,
  dataRanchi,
  dataRatlam,
  dataRishikesh,
  dataRoorkee,
  dataSamastipur,
  dataSanand,
  dataShimla,
  dataSrinagar,
  dataSurat,
  dataUdaipur,
  dataUjjain,
  dataUnnatNagar,
  dataVadodara,
  dataVaranasi,
  dataVisakhapatnam,
  dataVrindavan,
} from "./Pages/SourceToDestination";
import CabListing2 from "./Pages/CabListing2";
import CabListing3 from "./Pages/CabListing3";
import CabListing4 from "./Pages/CabListing4";

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
          <Route path={"/cabs/listing/:params"} element={<CabListing />} />

          <Route path={"/journey-details/:id"} element={<CabDetails />} />
          <Route path={"/FAQ"} element={<Faq />} />
          <Route path={"/payment/:transactionId?"} element={<Payment />} />
          <Route
            path={"/terms-and-conditions"}
            element={<TermsAndCondition />}
          />
          <Route path={"/refund-policy"} element={<RefundPolicy />} />
          <Route path={"/privacy-policy"} element={<PrivacyPolicy />} />

          {/* From Delhi */}
          {/* 15 Locations  */}

          <Route
            path={"/cab/delhi-to-agra-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Agra, Uttar Pradesh, India"}
                blogdata={dataAgra}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jaipur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jaipur, Rajasthan, India"}
                blogdata={dataJaipur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-chandigarh-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Chandigarh, India"}
                blogdata={dataChandigarh}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-dehradun-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Dehradun, Uttarakhand, India"}
                blogdata={dataDehradun}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-haridwar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Haridwar, Uttarakhand, India"}
                blogdata={dataHaridwar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-rishikesh-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Rishikesh, Uttarakhand, India"}
                blogdata={dataRishikesh}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-manali-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Manali, Himachal Pradesh, India"}
                blogdata={dataManali}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-shimla-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Shimla, Himachal Pradesh, India"}
                blogdata={dataShimla}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kasol-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kasol, Himachal Pradesh, India"}
                blogdata={dataKasol}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kasauli-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kasauli, Himachal Pradesh, India"}
                blogdata={dataKasauli}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-mcleodganj-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={
                  "McLeod Ganj, Dharamshala, Himachal Pradesh, India"
                }
                blogdata={dataMcLeodganj}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kullu-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kullu, Himachal Pradesh, India"}
                blogdata={dataKullu}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-mathura-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Mathura, Uttar Pradesh, India"}
                blogdata={dataMathura}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-vrindavan-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Vrindavan, Uttar Pradesh, India"}
                blogdata={dataVrindavan}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bijnor-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bijnor, Uttar Pradesh, India"}
                blogdata={dataBijnor}
              />
            }
          />

          {/* 20 locations */}

          <Route
            path={"/cab/delhi-to-bareilly-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bareilly, Uttar Pradesh, India"}
                blogdata={dataBareilly}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-auli-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Auli Laga Salude, Uttarakhand, India"}
                blogdata={dataAuli}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-haldwani-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Haldwani, Uttarakhand, India"}
                blogdata={dataHaldwani}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-moradabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Moradabad, Uttar Pradesh, India"}
                blogdata={dataMoradabad}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-varanasi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Varanasi, Uttar Pradesh, India"}
                blogdata={dataVaranasi}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ambala-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ambala, Haryana, India"}
                blogdata={dataAmbala}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-mohali-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Mohali, Punjab, India"}
                blogdata={dataMohali}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-batala-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Batala, Punjab, India"}
                blogdata={dataBatala}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-dharamshala-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Dharamshala, Himachal Pradesh, India"}
                blogdata={dataDharamshala}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-mussoorie-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Mussoorie, Uttarakhand, India"}
                blogdata={dataMussoorie}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jalandhar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jalandhar, Punjab, India"}
                blogdata={dataJalandhar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-srinagar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Srinagar, Jammu and Kashmir, India"}
                blogdata={dataSrinagar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-dalhousie-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Dalhousie, Himachal Pradesh, India"}
                blogdata={dataDalhousie}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-amritsar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Amritsar, Punjab, India"}
                blogdata={dataAmritsar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-udaipur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Udaipur, Rajasthan, India"}
                blogdata={dataUdaipur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-nainital-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Nainital, Uttarakhand, India"}
                blogdata={dataNainital}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-karnal-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Karnal, Haryana, India"}
                blogdata={dataKarnal}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-alwar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Alwar, Rajasthan, India"}
                blogdata={dataAlwar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-gwalior-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Gwalior, Madhya Pradesh, India"}
                blogdata={dataGwalior}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jodhpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jodhpur, Rajasthan, India"}
                blogdata={dataJodhpur}
              />
            }
          />

          {/* 50 locations */}

          <Route
            path={"/cab/delhi-to-lucknow-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Lucknow, Uttar Pradesh, India"}
                blogdata={dataLucknow}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ludhiana-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ludhiana, Punjab, India"}
                blogdata={dataLudhiana}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kanpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kanpur, Uttar Pradesh, India"}
                blogdata={dataKanpur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-meerut-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Meerut, Uttar Pradesh, India"}
                blogdata={dataMeerut}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-roorkee-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Roorkee, Uttarakhand, India"}
                blogdata={dataRoorkee}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-patna-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Patna, Bihar, India"}
                blogdata={dataPatna}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ayodhya-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ayodhya, Uttar Pradesh, India"}
                blogdata={dataAyodhya}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-gorakhpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Gorakhpur, Uttar Pradesh, India"}
                blogdata={dataGorakhpur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-basti-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Basti, Uttar Pradesh, India"}
                blogdata={dataBasti}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-pune-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Pune, Maharashtra, India"}
                blogdata={dataPune}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-katra-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Katra, Jammu and Kashmir, India"}
                blogdata={dataKatra}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-mumbai-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Mumbai, Maharashtra, India"}
                blogdata={dataMumbai}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kolkata-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kolkata, West Bengal, India"}
                blogdata={dataKolkata}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-hyderabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Hyderabad, Telangana, India"}
                blogdata={dataHyderabad}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-coimbatore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Coimbatore, Tamil Nadu, India"}
                blogdata={dataCoimbatore}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-visakhapatnam-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Visakhapatnam, Andhra Pradesh, India"}
                blogdata={dataVisakhapatnam}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-rameshwaram-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Rameshwaram, Tamil Nadu, India"}
                blogdata={dataRameshwaram}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bangalore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bangalore, Karnataka, India"}
                blogdata={dataBangalore}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-guwahati-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Guwahati, Assam, India"}
                blogdata={dataGuwahati}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bathinda-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bathinda, Punjab, India"}
                blogdata={dataBathinda}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-chhindwara-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Chhindwara, Madhya Pradesh, India"}
                blogdata={dataChhindwara}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-muzaffarpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Muzaffarpur, Bihar, India"}
                blogdata={dataMuzaffarpur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ranchi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ranchi, Jharkhand, India"}
                blogdata={dataRanchi}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bihar-sharif-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bihar Sharif, Bihar, India"}
                blogdata={dataBiharSharif}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-raipur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Raipur, Chhattisgarh, India"}
                blogdata={dataRaipur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-akola-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Akola, Maharashtra, India"}
                blogdata={dataAkola}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ramachandrapuram-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ramachandrapuram, Andhra Pradesh, India"}
                blogdata={dataRamachandrapuram}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-katraj-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Katraj, Pune, Maharashtra, India"}
                blogdata={dataKatraj}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-rajkot-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Rajkot, Gujarat, India"}
                blogdata={dataRajkot}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-surat-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Surat, Gujarat, India"}
                blogdata={dataSurat}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jabalpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jabalpur, Madhya Pradesh, India"}
                blogdata={dataJabalpur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ujjain-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ujjain, Madhya Pradesh, India"}
                blogdata={dataUjjain}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ratlam-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ratlam, Madhya Pradesh, India"}
                blogdata={dataRatlam}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-gandhinagar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Gandhinagar, Gujarat, India"}
                blogdata={dataGandhinagar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-sanand-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Sanand, Gujarat, India"}
                blogdata={dataSanand}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jamnagar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jamnagar, Gujarat, India"}
                blogdata={dataJamnagar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-pithampur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Pithampur, Madhya Pradesh, India"}
                blogdata={dataPithampur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-indore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Indore, Madhya Pradesh, India"}
                blogdata={dataIndore}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-allahabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Allahabad, Uttar Pradesh, India"}
                blogdata={dataAllahabad}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-hoshangabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Hoshangabad, Madhya Pradesh, India"}
                blogdata={dataHoshangabad}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-Unnatnagar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={
                  "Unnat Nagar, Goregaon West, Mumbai, Maharashtra, India"
                }
                blogdata={dataUnnatNagar}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ahmedabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ahmedabad, Gujarat, India"}
                blogdata={dataAhmedabad}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-dwarka-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Dwarka, Gujarat, India"}
                blogdata={dataDwarka}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-itarsi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Itarsi, Madhya Pradesh, India"}
                blogdata={dataItarsi}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-raisen-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Raisen, Madhya Pradesh, India"}
                blogdata={dataRaisen}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-samastipur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Samastipur, Bihar, India"}
                blogdata={dataSamastipur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-vadodara-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Vadodara, Gujarat, India"}
                blogdata={dataVadodara}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bilaspur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bilaspur, Chhattisgarh, India"}
                blogdata={dataBilaspur}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-faridabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Faridabad, Haryana, India"}
                blogdata={dataFaridabad}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-noida-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Noida, Uttar Pradesh, India"}
                blogdata={dataNoida}
              />
            }
          />

          {/* New locations */}

          <Route
            path={"/cab/delhi-to-murthal-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Murthal, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-hapur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Hapur, Uttar Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-palwal-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Palwal, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-baraut-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Baraut, Uttar Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-neemrana-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Neemrana, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bhiwadi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bhiwadi, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-sonipat-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Sonipat, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jhajjar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jhajjar, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-rohtak-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Rohtak, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-sahibabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Sahibabad, Ghaziabad, Uttar Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-firozpur-jhirka-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Firozpur Jhirka, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jim-corbett-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jim Corbett, Halduchaur, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-manesar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Manesar, Gurugram, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-sohna-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Sohna, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bharatpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bharatpur, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-lansdowne-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Lansdowne, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-sariska-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Sariska Tiger Reserve, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-solan-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Solan, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-nahan-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Nahan, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kanatal-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kanatal, Kaudia Range, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-pushkar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Pushkar, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-chail-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Chail, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kufri-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kufri, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bhimtal-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bhimtal, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ranthambore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ranthambore National Park, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-mukteshwar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Mukteshwar, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-shoghi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Shoghi, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kausani-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kausani, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-orchha-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Orchha, Madhya Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bikaner-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bikaner, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ajmer-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ajmer, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-pangot-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Pangot, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ranikhet-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ranikhet, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-naldehra-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Naldehra, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-almora-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Almora, Uttarakhand, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-narkanda-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Narkanda, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-malana-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Malana, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-manikaran-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Manikaran, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-kangra-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Kangra, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-spiti-valley-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Spiti Valley, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-khajuraho-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Khajuraho, Madhya Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-chamba-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Chamba, Himachal Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-ranakpur-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Ranakpur, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-jaisalmer-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Jaisalmer, Rajasthan, India"}
              />
            }
          />
          <Route
            path={"/cab/delhi-to-bir-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
                destination={"Bir, Himachal Pradesh, India"}
              />
            }
          />

          {/* From Agra */}

          <Route
            path={"/cab/agra-to-delhi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Agra, Uttar Pradesh, India"
                destination={"Delhi, India"}
              />
            }
          />
          <Route
            path={"/cab/agra-to-noida-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Agra, Uttar Pradesh, India"
                destination={"Noida, Uttar Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/agra-to-faridabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Agra, Uttar Pradesh, India"
                destination={"Faridabad, Haryana, India"}
              />
            }
          />
          <Route
            path={"/cab/agra-to-ghaziabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Agra, Uttar Pradesh, India"
                destination={"Ghaziabad, Uttar Pradesh, India"}
              />
            }
          />
          <Route
            path={"/cab/agra-to-gurgaon-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Agra, Uttar Pradesh, India"
                destination={"Gurgaon, Haryana, India"}
              />
            }
          />

          {/* From Jaipur */}

          <Route
            path={"/cab/jaipur-to-delhi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Jaipur, Rajasthan, India"
                destination={"Delhi, India"}
              />
            }
          />
          <Route
            path={"/cab/jaipur-to-gurgaon-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Jaipur, Rajasthan, India"
                destination={"Gurgaon, Haryana, India"}
              />
            }
          />

          <Route
            path={"/cab/jaipur-to-noida-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Jaipur, Rajasthan, India"
                destination={"Noida, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/jaipur-to-faridabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Jaipur, Rajasthan, India"
                destination={"Faridabad, Haryana, India"}
              />
            }
          />

          <Route
            path={"/cab/jaipur-to-ghaziabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Jaipur, Rajasthan, India"
                destination={"Ghaziabad, Uttar Pradesh, India"}
              />
            }
          />

          {/* From Pune */}

          <Route
            path={"/cab/pune-to-mumbai-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Pune, Maharashtra, India"
                destination={"Mumbai, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/pune-to-shirdi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Pune, Maharashtra, India"
                destination={"Shirdi, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/pune-to-mahabaleshwar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Pune, Maharashtra, India"
                destination={"Mahabaleshwar, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/pune-to-nasik-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Pune, Maharashtra, India"
                destination={"Nasik, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/pune-to-aurangabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Pune, Maharashtra, India"
                destination={"Aurangabad, Maharashtra, India"}
              />
            }
          />

          {/* From Mumbai */}

          <Route
            path={"/cab/mumbai-to-pune-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Mumbai, Maharashtra, India"
                destination={"Pune, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/mumbai-to-nasik-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Mumbai, Maharashtra, India"
                destination={"Nasik, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/mumbai-to-shirdi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Mumbai, Maharashtra, India"
                destination={"Shirdi, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/mumbai-to-lonavala-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Mumbai, Maharashtra, India"
                destination={"Lonavala, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/mumbai-to-mahabaleshwar-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Mumbai, Maharashtra, India"
                destination={"Mahabaleshwar, Maharashtra, India"}
              />
            }
          />

          {/* From Chandigarh */}

          <Route
            path={"/cab/chandigarh-to-delhi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chandigarh, India"
                destination={"Delhi, India"}
              />
            }
          />

          <Route
            path={"/cab/chandigarh-to-shimla-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chandigarh, India"
                destination={"Shimla, Himachal Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/chandigarh-to-manali-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chandigarh, India"
                destination={"Manali, Himachal Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/chandigarh-to-gurgaon-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chandigarh, India"
                destination={"Gurgaon, Haryana, India"}
              />
            }
          />

          <Route
            path={"/cab/chandigarh-to-noida-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chandigarh, India"
                destination={"Noida, Uttar Pradesh, India"}
              />
            }
          />

          {/* From Bangalore */}

          <Route
            path={"/cab/bangalore-to-ooty-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Bangalore, Karnataka, India"
                destination={"Ooty, Tamil Nadu, India"}
              />
            }
          />

          <Route
            path={"/cab/bangalore-to-madikeri-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Bangalore, Karnataka, India"
                destination={"Madikeri, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/bangalore-to-coorg-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Bangalore, Karnataka, India"
                destination={"Coorg, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/bangalore-to-vellore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Bangalore, Karnataka, India"
                destination={"Vellore, Tamil Nadu, India"}
              />
            }
          />

          {/* From Chennai */}

          <Route
            path={"/cab/chennai-to-vellore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chennai, Tamil Nadu, India"
                destination={"Vellore, Tamil Nadu, India"}
              />
            }
          />

          <Route
            path={"/cab/chennai-to-bangalore-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chennai, Tamil Nadu, India"
                destination={"Bangalore, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/chennai-to-pondicherry-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chennai, Tamil Nadu, India"
                destination={"Pondicherry, India"}
              />
            }
          />

          <Route
            path={"/cab/chennai-to-tirupati-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Chennai, Tamil Nadu, India"
                destination={"Tirupati, Andhra Pradesh, India"}
              />
            }
          />

          {/* From Dehradun */}

          <Route
            path={"/cab/dehradun-to-mussoorie-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Dehradun, Uttarakhand, India"
                destination={"Mussoorie, Uttarakhand, India"}
              />
            }
          />

          <Route
            path={"/cab/dehradun-to-delhi-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Dehradun, Uttarakhand, India"
                destination={"Delhi, India"}
              />
            }
          />

          <Route
            path={"/cab/dehradun-to-gurgaon-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Dehradun, Uttarakhand, India"
                destination={"Gurgaon, Haryana, India"}
              />
            }
          />

          <Route
            path={"/cab/dehradun-to-noida-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Dehradun, Uttarakhand, India"
                destination={"Noida, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/dehradun-to-faridabad-cabs"}
            element={
              <CabListing1
                selectedValue={"Outstation One-Way"}
                source="Dehradun, Uttarakhand, India"
                destination={"Faridabad, Haryana, India"}
              />
            }
          />

          {/* Other Taxi Services */}
          {/* Delhi */}
          <Route
            path={"/cab/delhi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Delhi, India"
              />
            }
          />

          <Route
            path={"/cab/ghaziabad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source={"Ghaziabad, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/noida-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Noida, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/bahadurgarh-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bahadurgarh, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/bagpat-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bagpat, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/baghpat-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Baghpat, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/gurgaon-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Gurgaon, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/gurugram-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Gurugram, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/faridabad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Faridabad, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/basai-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Basai, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/dadri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dadri, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/greater-noida-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Greater Noida, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/kharkhoda-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kharkhoda, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/modinagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Modinagar, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/sonipat-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sonipat, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/murthal-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Murthal, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/manesar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Manesar, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/barau-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Barau, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/baraut-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Baraut, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/gautam-buddha-nagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Gautam Buddha Nagar, Uttar Pradesh, India"
              />
            }
          />

          {/* Agra */}
          <Route
            path={"/cab/shamshabad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shamshabad, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/kagarol-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kagarol, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/sadabad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sadabad, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/bisawar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bisawar, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/tundla-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Tundla, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/rajakhera-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Rajakhera, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/fatehpur-sikri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Fatehpur Sikri, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/firozabad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Firozabad, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/jalesar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Jalesar, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/hathras-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Hathras, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/mathura-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mathura, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/bharatpur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bharatpur, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/dholpur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dholpur, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/vrindavan-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Vrindavan, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/ambah-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ambah, Madhya Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/shikohabad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shikohabad, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/holipura-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Holipura, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/sasni-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sasni, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/iglas-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Iglas, Uttar Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/govardhan-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Govardhan, Uttar Pradesh, India"
              />
            }
          />

          {/* Jaipur */}
          <Route
            path={"/cab/shekhawati-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shekhawati, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/kukas-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kukas, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/bhambhoria-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="BHAMBHORIA, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/begas-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Begas, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/bassi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bassi, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/achrol-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Achrol, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/chomu-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chomu, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/asalpur-jobner-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Asalpur Jobner, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/chaksu-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chaksu, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/pawta-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Pawta, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/jobner-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Jobner, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/alila-fort-bishangarh-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Alila Fort Bishangarh, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/mojamabaad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mojamabaad, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/renwal-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Renwal, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/mehandipur-balaji-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mehandipur Balaji, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/dausa-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dausa, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/virat-nagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Virat Nagar, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/shahpura-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shahpura, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/ringas-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ringas, Rajasthan, India"
              />
            }
          />

          <Route
            path={"/cab/khatu-shyam-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Khatu Shyam, Rajasthan, India"
              />
            }
          />

          {/* Pune */}
          <Route
            path={"/cab/pimpri-chinchwad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Pimpri Chinchwad, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/induri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Induri, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/talegaon-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Talegaon, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/shikrapur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shikrapur, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/lavasa-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Lavasa, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/bhor-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bhor, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/jejuri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Jejuri, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/pawna-lake-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Pawna Lake, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/shirval-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shirval, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/aamby-valley-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Aamby Valley, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/raigad-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Raigad, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/lonavala-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Lonavala, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/manchar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Manchar, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/khandala-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Khandala, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/kedagaon-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kedagaon, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/imagica-adlab-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Imagica Adlab, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/khopoli-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Khopoli, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/shirur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shirur, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/imagica-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Imagica, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/panchgani-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Panchgani, Maharashtra, India"
              />
            }
          />

          {/* Mumbai */}
          <Route
            path={"/cab/ltt-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="LTT, Mumbai, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/andheri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Andheri, Mumbai, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/navi-mumbai-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Navi Mumbai, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/thane-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Thane, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/mira-bhayandar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mira Bhayandar, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/new-panvel-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="New Panvel, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/panvel-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Panvel, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/dombivli-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dombivli, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/bhiwandi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bhiwandi, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/kalyan-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kalyan, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/ambernath-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ambernath, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/vasai-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Vasai, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/badalapur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Badalapur, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/matheran-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Matheran, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/aman-lodge-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Aman Lodge, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/virar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Virar, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/alibag-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Alibag, Maharashtra, India"
              />
            }
          />

          <Route
            path={"/cab/neral-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Neral, Maharashtra, India"
              />
            }
          />

          {/* Chandigarh */}
          <Route
            path={"/cab/mohali-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mohali, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/sahibzada-ajit-singh-nagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sahibzada Ajit Singh Nagar, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/panchkula-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Panchkula, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/zira-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Zira, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/zirakpur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Zirakpur, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/kharar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kharar, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/darpan-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Darpan, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/dera-bassi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dera Bassi, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/kalka-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kalka, Haryana, India"
              />
            }
          />

          <Route
            path={"/cab/parwanoo-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Parwanoo, Himachal Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/kurali-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kurali, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/baddi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Baddi, Himachal Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/kasauli-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kasauli, Himachal Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/lalru-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Lalru, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/barog-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Barog, Himachal Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/rajpur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Rajpur, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/rajpura-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Rajpura, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/nalagarh-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Nalagarh, Himachal Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/ropar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ropar, Punjab, India"
              />
            }
          />

          <Route
            path={"/cab/rupnagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Rupnagar, Punjab, India"
              />
            }
          />

          {/* Bangalore */}
          <Route
            path={"/cab/hoskote-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Hoskote, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/nelamangala-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Nelamangala, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/bangalore-rural-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bangalore Rural, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/hosur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Hosur, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/dodballapur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dodballapur, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/malur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Malur, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/magadi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Magadi, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/ramanagara-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ramanagara, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/nandi-hills-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Nandi Hills, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/kanakapura-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kanakapura, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/chikballapur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chikballapur, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/chikkaballapur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chikkaballapur, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/denkanikottai-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Denkanikottai, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/channapatna-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Channapatna, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/sidlaghatta-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sidlaghatta, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/shoolagiri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Shoolagiri, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/kodagu-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kodagu, Karnataka, India"
              />
            }
          />

          <Route
            path={"/cab/kolar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kolar, Karnataka, India"
              />
            }
          />

          {/* Chennai */}
          <Route
            path={"/cab/anna-road-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Anna Road, Chennai, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/ambattur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ambattur, Chennai, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/tambaram-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Tambaram, Chennai, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/minjur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Minjur, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/ponneri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Ponneri, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/sriperumbudur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sriperumbudur, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/tiruvallur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Tiruvallur, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/gummidipoondi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Gummidipoondi, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/uttukottai-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Uttukottai, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/mahabalipuram-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mahabalipuram, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/chengalpattu-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chengalpattu, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/chinglepet-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chinglepet, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/arambakkam-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Arambakkam, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/arakkonam-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Arakkonam, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/varadaiahpalem-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Varadaiahpalem, Andhra Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/kanchipuram-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kanchipuram, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/tiruttani-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Tiruttani, Tamil Nadu, India"
              />
            }
          />

          <Route
            path={"/cab/sullurpeta-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Sullurpeta, Andhra Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/madurantakam-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Madurantakam, Tamil Nadu, India"
              />
            }
          />

          {/* Dehradun  */}
          <Route
            path={"/cab/mussoorie-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Mussoorie, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/dhanaulti-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Dhanaulti, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/kalsi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kalsi, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/narendra-nagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Narendra Nagar, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/vikasnagar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Vikasnagar, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/kanatal-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Kanatal, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/rishikesh-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Rishikesh, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/new-tehri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="New Tehri, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/tehri-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Tehri, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/neelkanth-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Neelkanth, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/haridwar-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Haridwar, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/paonta-sahib-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Paonta Sahib, Himachal Pradesh, India"
              />
            }
          />

          <Route
            path={"/cab/chakrata-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Chakrata, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/bhagwanpur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Bhagwanpur, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/roorkee-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Roorkee, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/naugaon-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Naugaon, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/uttarkashi-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Uttarkashi, Uttarakhand, India"
              />
            }
          />

          <Route
            path={"/cab/saharanpur-city-cabs"}
            element={
              <CabListing2
                selectedValue={"Outstation One-Way"}
                source="Saharanpur, Uttar Pradesh, India"
              />
            }
          />

          {/* Rental Services in Other Cities */}
          {/* Delhi to Agra */}

          <Route
            path={"/cab/rental-cabs-in-faridabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Faridabad, Haryana, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-solapur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Solapur, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-delhi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Delhi, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-noida"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Noida, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-ahmedabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Ahmedabad, Gujarat, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-vijayawada"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Vijayawada, Andhra Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-hyderabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Hyderabad, Telangana, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kozhikode"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kozhikode, Kerala, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kangra"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kangra, Himachal Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-ludhiana"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Ludhiana, Punjab, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-new-delhi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"New Delhi, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kochi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kochi, Kerala, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-lucknow"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Lucknow, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-allahabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Allahabad, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bangalore"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bangalore, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-thiruvananthapuram"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Thiruvananthapuram, Kerala, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-dehradun"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Dehradun, Uttarakhand, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-pondicherry"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Pondicherry, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-shirdi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Shirdi, Maharashtra, India"}
              />
            }
          />

          {/* Delhi to Jaipur */}
          <Route
            path={"/cab/rental-cabs-in-chandigarh"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Chandigarh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-jaipur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Jaipur, Rajasthan, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-mangaluru"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Mangaluru, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-nagpur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Nagpur, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-belgaum"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Belgaum, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-mysore"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Mysore, Karnataka, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-salem"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Salem, Tamil Nadu, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-asansol"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Asansol, West Bengal, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-goa"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Goa, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-jammu"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Jammu, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-baga"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Baga, Goa, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-surat"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Surat, Gujarat, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-srinagar"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Srinagar, Jammu and Kashmir, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bareilly"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bareilly, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-thane"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Thane, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-ghaziabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Ghaziabad, Uttar Pradesh, India"}
              />
            }
          />

          {/* Delhi to Dehradun */}
          <Route
            path={"/cab/rental-cabs-in-tirupati"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Tirupati, Andhra Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-jabalpur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Jabalpur, Madhya Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-jamshedpur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Jamshedpur, Jharkhand, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bokaro"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bokaro, Jharkhand, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bhuj"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bhuj, Gujarat, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-gaya"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Gaya, Bihar, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-nashik"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Nashik, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-ranchi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Ranchi, Jharkhand, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-gwalior"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Gwalior, Madhya Pradesh, India"}
              />
            }
          />

          {/* Delhi to Haridwar */}
          <Route
            path={"/cab/rental-cabs-in-navi-mumbai"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Navi Mumbai, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-patna"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Patna, Bihar, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-gorakhpur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Gorakhpur, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-coimbatore"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Coimbatore, Tamil Nadu, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kullu"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kullu, Himachal Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bengaluru"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bengaluru, Karnataka, India"}
              />
            }
          />

          {/* Agra To Delhi */}
          <Route
            path={"/cab/rental-cabs-in-chandigarh"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Chandigarh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-pune"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Pune, Maharashtra, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-amritsar"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Amritsar, Punjab, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-raipur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Raipur, Chhattisgarh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-rajkot"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Rajkot, Gujarat, India"}
              />
            }
          />

          {/* Agra To Noida */}
          <Route
            path={"/cab/rental-cabs-in-durgapur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Durgapur, West Bengal, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bhopal"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bhopal, Madhya Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kanpur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kanpur, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-madurai"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Madurai, Tamil Nadu, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-allahabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Allahabad, Uttar Pradesh, India"}
              />
            }
          />

          {/* Agra To Faridabad  */}
          <Route
            path={"/cab/rental-cabs-in-bhubaneswar"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bhubaneswar, Odisha, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kolkata"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kolkata, West Bengal, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-baga"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Baga, Goa, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-mumbai"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Mumbai, Maharashtra, India"}
              />
            }
          />

          {/* Agra To Ghaziabad   */}
          <Route
            path={"/cab/rental-cabs-in-jamnagar"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Jamnagar, Gujarat, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-indore"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Indore, Madhya Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-jodhpur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Jodhpur, Rajasthan, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-udaipur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Udaipur, Rajasthan, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-gurgaon"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Gurgaon, Haryana, India"}
              />
            }
          />

          {/* Jaipur To Delhi   */}
          <Route
            path={"/cab/rental-cabs-in-chennai"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Chennai, Tamil Nadu, India"}
              />
            }
          />

          {/* Jaipur To Gurgaon   */}

          <Route
            path={"/cab/rental-cabs-in-agra"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Agra, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-raipur"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Raipur, Chhattisgarh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-varanasi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Varanasi, Uttar Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-delhi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Delhi, India"}
              />
            }
          />

          {/* Jaipur To Noida  */}
          <Route
            path={"/cab/rental-cabs-in-srinagar"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Srinagar, Jammu and Kashmir, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-goa"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Goa, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-kozhikode"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kozhikode, Kerala, India"}
              />
            }
          />

          {/* Jaipur To Faridabad  */}
          <Route
            path={"/cab/rental-cabs-in-ghaziabad"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Ghaziabad, Uttar Pradesh, India"}
              />
            }
          />

          {/* Jaipur To Ghaziabad  */}
          <Route
            path={"/cab/rental-cabs-in-kochi"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kochi, Kerala, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bhubaneswar"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bhubaneswar, Odisha, India"}
              />
            }
          />

          {/* Pune To Mumbai   */}
          <Route
            path={"/cab/rental-cabs-in-kangra"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kangra, Himachal Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-rajkot"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Rajkot, Gujarat, India"}
              />
            }
          />

          {/* Pune To Shirdi  */}
          <Route
            path={"/cab/rental-cabs-in-kullu"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Kullu, Himachal Pradesh, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-trichy"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Trichy, Tamil Nadu, India"}
              />
            }
          />

          <Route
            path={"/cab/rental-cabs-in-bokaro"}
            element={
              <CabListing3
                selectedValue={"Hourly Rentals"}
                source={"Bokaro, Jharkhand, India"}
              />
            }
          />


          <Route path={"/*"} element={<Home />} />
        </Routes>
      </Suspense>
    </BrowserRouter>
  );
}

export default App;
