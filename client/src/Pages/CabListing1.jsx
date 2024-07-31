import ListingView from "../Components/Cab/Listing/ListingView";
import Layout from "../Layout/Layout";
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";
import { useContext, useEffect, useState } from "react";
import { AppContext } from "../Context/JourneyContext";
import { calculateDistanceAndDuration } from "../Utility/DistanceCalculator";
import DelhiToDestination from "../Components/Cab/Listing/DelhiToDestination";
import CabOptions from "./CabListing/CabOptions";
import CabOptions1 from "./CabListing/CabOptions1";
import ServiceBlocks from "./ServiceBlocks/ServiceBlocks";
import DelhiToDesinationMeta1 from "./MetaTags/DelhiToDestination1";
import CabPopup from "../Components/Cab/Listing/CabPopup";
import RentalSection from "./CabListing/RentalSection";
import { useParams } from "react-router-dom";
import { PaymentContext } from "../Context/PaymentContext";
import { SendMail } from "../Utility/SendMail";

function CabListing1({ source, destination, blogdata, selectedValue, price }) {

  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const dayAfterTomorrow = new Date();
  dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

  const { journeyData, setJourneyData } = useContext(AppContext);
  const { paymentData } = useContext(PaymentContext);
  const [rentals, setRentals] = useState("4hrs40km");
  const data = {
    source: source,
    destination: destination,
    startDate: tomorrow,
    returnDate: dayAfterTomorrow,
    rentals: rentals,
    selectedValue: selectedValue,
    startTime: "12:00 PM",
    returnTime: "12:00 PM",
  };

  useEffect(() => {
    async function sendQueryEmail() {
      if (paymentData.contact) {
        const res = await SendMail(
          "booking@sewaktravels.Com",
          "Demo",
          `<h1>New Query From Search bar:</h1>
        
        <h5>Mobile Number : ${paymentData.contact}</h5>
        <h5>Source : ${journeyData.source}</h5>
        <h5>Destination : ${journeyData.destination}</h5>
        <h5>Trip Type :  One way</h5>
        <h5>Start Date : ${journeyData.startDate}</h5>
        `,
          "Booking Query"
        );
        console.log(res);
      }
    }
    sendQueryEmail();
  }, []);

  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);
  }, []);

  const [isValid, setisValid] = useState("notValid");

  const PagesDetail = {
    Delhi: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Delhi",
        links: [
          {
            name: "Delhi to Chandigarh Cab",
            src: "/cab/delhi-to-chandigarh-cabs",
          },
          {
            name: "Delhi to Haridwar Cab",
            src: "/cab/delhi-to-haridwar-cabs",
          },
          {
            name: "Delhi to Dehradun Cab",
            src: "/cab/delhi-to-dehradun-cabs",
          },
          {
            name: "Delhi to Agra Cab",
            src: "/cab/delhi-to-agra-cabs",
          },
          {
            name: "Delhi to Jaipur Cab",
            src: "/cab/delhi-to-jaipur-cabs",
          },
          {
            name: "Delhi to Kasauli Cab",
            src: "/cab/delhi-to-kasauli-cabs",
          },
          {
            name: "Delhi to Kasol Cab",
            src: "/cab/delhi-to-kasol-cabs",
          },
          {
            name: "Delhi to Manali Cab",
            src: "/cab/delhi-to-manali-cabs",
          },
          {
            name: "Delhi to Rishikesh Cab",
            src: "/cab/delhi-to-rishikesh-cabs",
          },
          {
            name: "Delhi to Shimla Cab",
            src: "/cab/delhi-to-shimla-cabs",
          },
          {
            name: "Delhi to McLeodganj Cab",
            src: "/cab/delhi-to-mcleodganj-cabs",
          },
          {
            name: "Delhi to Mathura Cab",
            src: "/cab/delhi-to-mathura-cabs",
          },
          {
            name: "Delhi to Vrindavan Cab",
            src: "/cab/delhi-to-vrindavan-cabs",
          },
          {
            name: "Delhi to Kullu Cab",
            src: "/cab/delhi-to-kullu-cabs",
          },
          {
            name: "Delhi to Bijnor Cab",
            src: "/cab/delhi-to-bijnor-cabs",
          },
          {
            name: "Delhi to Dharamshala Cab",
            src: "/cab/delhi-to-dharamshala-cabs",
          },
          {
            name: "Delhi to Dalhousie Cab",
            src: "/cab/delhi-to-dalhousie-cabs",
          },
          {
            name: "Delhi to Ambala Cab",
            src: "/cab/delhi-to-ambala-cabs",
          },
          {
            name: "Delhi to Auli Cab",
            src: "/cab/delhi-to-auli-cabs",
          },
          {
            name: "Delhi to Bareilly Cab",
            src: "/cab/delhi-to-bareilly-cabs",
          },
          {
            name: "Delhi to Haldwani Cab",
            src: "/cab/delhi-to-haldwani-cabs",
          },
          {
            name: "Delhi to Moradabad Cab",
            src: "/cab/delhi-to-moradabad-cabs",
          },
          {
            name: "Delhi to Varanasi Cab",
            src: "/cab/delhi-to-varanasi-cabs",
          },
          {
            name: "Delhi to Mussoorie Cab",
            src: "/cab/delhi-to-mussoorie-cabs",
          },
          {
            name: "Delhi to Batala Cab",
            src: "/cab/delhi-to-batala-cabs",
          },
          {
            name: "Delhi to Mohali Cab",
            src: "/cab/delhi-to-mohali-cabs",
          },
          {
            name: "Delhi to Jalandhar Cab",
            src: "/cab/delhi-to-jalandhar-cabs",
          },
          {
            name: "Delhi to Srinagar Cab",
            src: "/cab/delhi-to-srinagar-cabs",
          },
          {
            name: "Delhi to Nainital Cab",
            src: "/cab/delhi-to-nainital-cabs",
          },
          {
            name: "Delhi to Udaipur Cab",
            src: "/cab/delhi-to-udaipur-cabs",
          },
          {
            name: "Delhi to Alwar Cab",
            src: "/cab/delhi-to-alwar-cabs",
          },
          {
            name: "Delhi to Jodhpur Cab",
            src: "/cab/delhi-to-jodhpur-cabs",
          },
          {
            name: "Delhi to Amritsar Cab",
            src: "/cab/delhi-to-amritsar-cabs",
          },
          {
            name: "Delhi to Gwalior Cab",
            src: "/cab/delhi-to-gwalior-cabs",
          },
          {
            name: "Delhi to Karnal Cab",
            src: "/cab/delhi-to-karnal-cabs",
          },
          {
            name: "Delhi to Lucknow Cab",
            src: "/cab/delhi-to-lucknow-cabs",
          },
          {
            name: "Delhi to Ludhiana Cab",
            src: "/cab/delhi-to-ludhiana-cabs",
          },
          {
            name: "Delhi to Kanpur Cab",
            src: "/cab/delhi-to-kanpur-cabs",
          },
          {
            name: "Delhi to Meerut Cab",
            src: "/cab/delhi-to-meerut-cabs",
          },
          {
            name: "Delhi to Roorkee Cab",
            src: "/cab/delhi-to-roorkee-cabs",
          },
          {
            name: "Delhi to Patna Cab",
            src: "/cab/delhi-to-patna-cabs",
          },
          {
            name: "Delhi to Ayodhya Cab",
            src: "/cab/delhi-to-ayodhya-cabs",
          },
          {
            name: "Delhi to Gorakhpur Cab",
            src: "/cab/delhi-to-gorakhpur-cabs",
          },
          {
            name: "Delhi to Basti Cab",
            src: "/cab/delhi-to-basti-cabs",
          },
          {
            name: "Delhi to Pune Cab",
            src: "/cab/delhi-to-pune-cabs",
          },
          {
            name: "Delhi to Katra Cab",
            src: "/cab/delhi-to-katra-cabs",
          },
          {
            name: "Delhi to Mumbai Cab",
            src: "/cab/delhi-to-mumbai-cabs",
          },
          {
            name: "Delhi to Kolkata Cab",
            src: "/cab/delhi-to-kolkata-cabs",
          },
          {
            name: "Delhi to Hyderabad Cab",
            src: "/cab/delhi-to-hyderabad-cabs",
          },
          {
            name: "Delhi to Coimbatore Cab",
            src: "/cab/delhi-to-coimbatore-cabs",
          },
          {
            name: "Delhi to Visakhapatnam Cab",
            src: "/cab/delhi-to-visakhapatnam-cabs",
          },
          {
            name: "Delhi to Rameshwaram Cab",
            src: "/cab/delhi-to-rameshwaram-cabs",
          },
          {
            name: "Delhi to Bangalore Cab",
            src: "/cab/delhi-to-bangalore-cabs",
          },
          {
            name: "Delhi to Guwahati Cab",
            src: "/cab/delhi-to-guwahati-cabs",
          },
          {
            name: "Delhi to Bathinda Cab",
            src: "/cab/delhi-to-bathinda-cabs",
          },
          {
            name: "Delhi to Chhindwara Cab",
            src: "/cab/delhi-to-chhindwara-cabs",
          },
          {
            name: "Delhi to Muzaffarpur Cab",
            src: "/cab/delhi-to-muzaffarpur-cabs",
          },
          {
            name: "Delhi to Ranchi Cab",
            src: "/cab/delhi-to-ranchi-cabs",
          },
          {
            name: "Delhi to Bihar Sharif Cab",
            src: "/cab/delhi-to-bihar-sharif-cabs",
          },
          {
            name: "Delhi to Raipur Cab",
            src: "/cab/delhi-to-raipur-cabs",
          },
          {
            name: "Delhi to Akola Cab",
            src: "/cab/delhi-to-akola-cabs",
          },
          {
            name: "Delhi to Ramachandrapuram Cab",
            src: "/cab/delhi-to-ramachandrapuram-cabs",
          },
          {
            name: "Delhi to Katraj Cab",
            src: "/cab/delhi-to-katraj-cabs",
          },
          {
            name: "Delhi to Rajkot Cab",
            src: "/cab/delhi-to-rajkot-cabs",
          },
          {
            name: "Delhi to Surat Cab",
            src: "/cab/delhi-to-surat-cabs",
          },
          {
            name: "Delhi to Jabalpur Cab",
            src: "/cab/delhi-to-jabalpur-cabs",
          },
          {
            name: "Delhi to Ujjain Cab",
            src: "/cab/delhi-to-ujjain-cabs",
          },
          {
            name: "Delhi to Ratlam Cab",
            src: "/cab/delhi-to-ratlam-cabs",
          },
          {
            name: "Delhi to Gandhinagar Cab",
            src: "/cab/delhi-to-gandhinagar-cabs",
          },
          {
            name: "Delhi to Sanand Cab",
            src: "/cab/delhi-to-sanand-cabs",
          },
          {
            name: "Delhi to Jamnagar Cab",
            src: "/cab/delhi-to-jamnagar-cabs",
          },
          {
            name: "Delhi to Pithampur Cab",
            src: "/cab/delhi-to-pithampur-cabs",
          },
          {
            name: "Delhi to Indore Cab",
            src: "/cab/delhi-to-indore-cabs",
          },
          {
            name: "Delhi to Allahabad Cab",
            src: "/cab/delhi-to-allahabad-cabs",
          },
          {
            name: "Delhi to Hoshangabad Cab",
            src: "/cab/delhi-to-hoshangabad-cabs",
          },
          {
            name: "Delhi to Unnatnagar Cab",
            src: "/cab/delhi-to-unnatnagar-cabs",
          },
          {
            name: "Delhi to Ahmedabad Cab",
            src: "/cab/delhi-to-ahmedabad-cabs",
          },
          {
            name: "Delhi to Dwarka Cab",
            src: "/cab/delhi-to-dwarka-cabs",
          },
          {
            name: "Delhi to Itarsi Cab",
            src: "/cab/delhi-to-itarsi-cabs",
          },
          {
            name: "Delhi to Raisen Cab",
            src: "/cab/delhi-to-raisen-cabs",
          },
          {
            name: "Delhi to Samastipur Cab",
            src: "/cab/delhi-to-samastipur-cabs",
          },
          {
            name: "Delhi to Vadodara Cab",
            src: "/cab/delhi-to-vadodara-cabs",
          },
          {
            name: "Delhi to Bilaspur Cab",
            src: "/cab/delhi-to-bilaspur-cabs",
          },
          {
            name: "Delhi to Faridabad Cab",
            src: "/cab/delhi-to-faridabad-cabs",
          },
          {
            name: "Delhi to Noida Cab",
            src: "/cab/delhi-to-noida-cabs",
          },
          {
            name: "Delhi to Murthal Cab",
            src: "/cab/delhi-to-murthal-cabs",
          },
          {
            name: "Delhi to Hapur Cab",
            src: "/cab/delhi-to-hapur-cabs",
          },
          {
            name: "Delhi to Palwal Cab",
            src: "/cab/delhi-to-palwal-cabs",
          },
          {
            name: "Delhi to Baraut Cab",
            src: "/cab/delhi-to-baraut-cabs",
          },
          {
            name: "Delhi to Neemrana Cab",
            src: "/cab/delhi-to-neemrana-cabs",
          },
          {
            name: "Delhi to Bhiwadi Cab",
            src: "/cab/delhi-to-bhiwadi-cabs",
          },
          {
            name: "Delhi to Sonipat Cab",
            src: "/cab/delhi-to-sonipat-cabs",
          },
          {
            name: "Delhi to Jhajjar Cab",
            src: "/cab/delhi-to-jhajjar-cabs",
          },
          {
            name: "Delhi to Rohtak Cab",
            src: "/cab/delhi-to-rohtak-cabs",
          },
          {
            name: "Delhi to Sahibabad Cab",
            src: "/cab/delhi-to-sahibabad-cabs",
          },
          {
            name: "Delhi to Firozpur Jhirka Cab",
            src: "/cab/delhi-to-firozpur-jhirka-cabs",
          },
          {
            name: "Delhi to Jim Corbett Cab",
            src: "/cab/delhi-to-jim-corbett-cabs",
          },
          {
            name: "Delhi to Manesar Cab",
            src: "/cab/delhi-to-manesar-cabs",
          },
          {
            name: "Delhi to Sohna Cab",
            src: "/cab/delhi-to-sohna-cabs",
          },
          {
            name: "Delhi to Bharatpur Cab",
            src: "/cab/delhi-to-bharatpur-cabs",
          },
          {
            name: "Delhi to Lansdowne Cab",
            src: "/cab/delhi-to-lansdowne-cabs",
          },
          {
            name: "Delhi to Sariska Cab",
            src: "/cab/delhi-to-sariska-cabs",
          },
          {
            name: "Delhi to Solan Cab",
            src: "/cab/delhi-to-solan-cabs",
          },
          {
            name: "Delhi to Nahan Cab",
            src: "/cab/delhi-to-nahan-cabs",
          },
          {
            name: "Delhi to Kanatal Cab",
            src: "/cab/delhi-to-kanatal-cabs",
          },
          {
            name: "Delhi to Pushkar Cab",
            src: "/cab/delhi-to-pushkar-cabs",
          },
          {
            name: "Delhi to Chail Cab",
            src: "/cab/delhi-to-chail-cabs",
          },
          {
            name: "Delhi to Kufri Cab",
            src: "/cab/delhi-to-kufri-cabs",
          },
          {
            name: "Delhi to Bhimtal Cab",
            src: "/cab/delhi-to-bhimtal-cabs",
          },
          {
            name: "Delhi to Ranthambore Cab",
            src: "/cab/delhi-to-ranthambore-cabs",
          },
          {
            name: "Delhi to Mukteshwar Cab",
            src: "/cab/delhi-to-mukteshwar-cabs",
          },
          {
            name: "Delhi to Shoghi Cab",
            src: "/cab/delhi-to-shoghi-cabs",
          },
          {
            name: "Delhi to Kausani Cab",
            src: "/cab/delhi-to-kausani-cabs",
          },
          {
            name: "Delhi to Orchha Cab",
            src: "/cab/delhi-to-orchha-cabs",
          },
          {
            name: "Delhi to Bikaner Cab",
            src: "/cab/delhi-to-bikaner-cabs",
          },
          {
            name: "Delhi to Ajmer Cab",
            src: "/cab/delhi-to-ajmer-cabs",
          },
          {
            name: "Delhi to Pangot Cab",
            src: "/cab/delhi-to-pangot-cabs",
          },
          {
            name: "Delhi to Ranikhet Cab",
            src: "/cab/delhi-to-ranikhet-cabs",
          },
          {
            name: "Delhi to Naldehra Cab",
            src: "/cab/delhi-to-naldehra-cabs",
          },
          {
            name: "Delhi to Almora Cab",
            src: "/cab/delhi-to-almora-cabs",
          },
          {
            name: "Delhi to Narkanda Cab",
            src: "/cab/delhi-to-narkanda-cabs",
          },
          {
            name: "Delhi to Malana Cab",
            src: "/cab/delhi-to-malana-cabs",
          },
          {
            name: "Delhi to Manikaran Cab",
            src: "/cab/delhi-to-manikaran-cabs",
          },
          {
            name: "Delhi to Kangra Cab",
            src: "/cab/delhi-to-kangra-cabs",
          },
          {
            name: "Delhi to Spiti Valley Cab",
            src: "/cab/delhi-to-spiti-valley-cabs",
          },
          {
            name: "Delhi to Khajuraho Cab",
            src: "/cab/delhi-to-khajuraho-cabs",
          },
          {
            name: "Delhi to Chamba Cab",
            src: "/cab/delhi-to-chamba-cabs",
          },
          {
            name: "Delhi to Ranakpur Cab",
            src: "/cab/delhi-to-ranakpur-cabs",
          },
          {
            name: "Delhi to Jaisalmer Cab",
            src: "/cab/delhi-to-jaisalmer-cabs",
          },
          {
            name: "Delhi to Bir Cab",
            src: "/cab/delhi-to-bir-cabs",
          },
          {
            name: "Delhi to Naini Cab",
            src: "/cab/delhi-to-naini-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Delhi",
        links: [
          {
            name: "Taxi service in New Delhi",
            src: "/cab/delhi-city-cabs",
          },
          {
            name: "Taxi service in Ghaziabad",
            src: "/cab/ghaziabad-city-cabs",
          },
          {
            name: "Taxi service in Noida",
            src: "/cab/noida-city-cabs",
          },
          {
            name: "Taxi service in Bahadurgarh",
            src: "/cab/bahadurgarh-city-cabs",
          },
          {
            name: "Taxi service in Bagpat",
            src: "/cab/bagpat-city-cabs",
          },
          {
            name: "Taxi service in Baghpat",
            src: "/cab/baghpat-city-cabs",
          },
          {
            name: "Taxi service in Gurgaon",
            src: "/cab/gurgaon-city-cabs",
          },
          {
            name: "Taxi service in Gurugram",
            src: "/cab/gurugram-city-cabs",
          },
          {
            name: "Taxi service in Faridabad",
            src: "/cab/faridabad-city-cabs",
          },
          {
            name: "Taxi service in Basai",
            src: "/cab/basai-city-cabs",
          },
          {
            name: "Taxi service in Dadri",
            src: "/cab/dadri-city-cabs",
          },
          {
            name: "Taxi service in Greater Noida",
            src: "/cab/greater-noida-city-cabs",
          },
          {
            name: "Taxi service in Kharkhoda",
            src: "/cab/kharkhoda-city-cabs",
          },
          {
            name: "Taxi service in Modinagar",
            src: "/cab/modinagar-city-cabs",
          },
          {
            name: "Taxi service in Sonipat",
            src: "/cab/sonipat-city-cabs",
          },
          {
            name: "Taxi service in Murthal",
            src: "/cab/murthal-city-cabs",
          },
          {
            name: "Taxi service in Manesar",
            src: "/cab/manesar-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Delhi airport",
        links: [
          {
            name: "Delhi airport to Nurpur Cab",
            src: "/cab/delhi-airport-to-nurpur-cabs",
          },
          {
            name: "Delhi airport to Tsunduru Cab",
            src: "/cab/delhi-airport-to-tsunduru-cabs",
          },
          {
            name: "Delhi airport to Pathardi Cab",
            src: "/cab/delhi-airport-to-pathardi-cabs",
          },
          {
            name: "Delhi airport to Kakatpur Cab",
            src: "/cab/delhi-airport-to-kakatpur-cabs",
          },
          {
            name: "Delhi airport to Tumsar Cab",
            src: "/cab/delhi-airport-to-tumsar-cabs",
          },
          {
            name: "Delhi airport to Bekal Cab",
            src: "/cab/delhi-airport-to-bekal-cabs",
          },
          {
            name: "Delhi airport to Haldwani Cab",
            src: "/cab/delhi-airport-to-haldwani-cabs",
          },
          {
            name: "Delhi airport to Cachar Cab",
            src: "/cab/delhi-airport-to-cachar-cabs",
          },
          {
            name: "Delhi airport to Manipal Cab",
            src: "/cab/delhi-airport-to-manipal-cabs",
          },
          {
            name: "Delhi airport to Bhogapuram Cab",
            src: "/cab/delhi-airport-to-bhogapuram-cabs",
          },
          {
            name: "Delhi airport to Vadipatti Cab",
            src: "/cab/delhi-airport-to-vadipatti-cabs",
          },
          {
            name: "Delhi airport to Kot Kapura Cab",
            src: "/cab/delhi-airport-to-kot-kapura-cabs",
          },
          {
            name: "Delhi airport to Mauganj Cab",
            src: "/cab/delhi-airport-to-mauganj-cabs",
          },
          {
            name: "Delhi airport to Raisen Cab",
            src: "/cab/delhi-airport-to-raisen-cabs",
          },
          {
            name: "Delhi airport to Pimpri Chinchwad Cab",
            src: "/cab/delhi-airport-to-pimpri-chinchwad-cabs",
          },
          {
            name: "Delhi airport to Karkal Cab",
            src: "/cab/delhi-airport-to-karkal-cabs",
          },
          {
            name: "Delhi airport to Manesar Cab",
            src: "/cab/delhi-airport-to-manesar-cabs",
          },
          {
            name: "Delhi airport to Tanakpur Cab",
            src: "/cab/delhi-airport-to-tanakpur-cabs",
          },
          {
            name: "Delhi airport to Shahkot Cab",
            src: "/cab/delhi-airport-to-shahkot-cabs",
          },
          {
            name: "Delhi airport to Prithvipur Cab",
            src: "/cab/delhi-airport-to-prithvipur-cabs",
          },
          {
            name: "Delhi airport to Lakkavaram Cab",
            src: "/cab/delhi-airport-to-lakkavaram-cabs",
          },
          {
            name: "Delhi airport to Kakdwip Cab",
            src: "/cab/delhi-airport-to-kakdwip-cabs",
          },
          {
            name: "Delhi airport to Haripad Cab",
            src: "/cab/delhi-airport-to-haripad-cabs",
          },
          {
            name: "Delhi airport to Olpad Cab",
            src: "/cab/delhi-airport-to-olpad-cabs",
          },
          {
            name: "Delhi airport to Rupnagar Cab",
            src: "/cab/delhi-airport-to-rupnagar-cabs",
          },
          {
            name: "Delhi airport to Narkanda Cab",
            src: "/cab/delhi-airport-to-narkanda-cabs",
          },
          {
            name: "Delhi airport to Sirmaur Cab",
            src: "/cab/delhi-airport-to-sirmaur-cabs",
          },
          {
            name: "Delhi airport to Safidon Cab",
            src: "/cab/delhi-airport-to-safidon-cabs",
          },
          {
            name: "Delhi airport to Barwadih Cab",
            src: "/cab/delhi-airport-to-barwadih-cabs",
          },
          {
            name: "Delhi airport to Guna Cab",
            src: "/cab/delhi-airport-to-guna-cabs",
          },
          {
            name: "Delhi airport to Kulithalai Cab",
            src: "/cab/delhi-airport-to-kulithalai-cabs",
          },
          {
            name: "Delhi airport to Perumbavoor Cab",
            src: "/cab/delhi-airport-to-perumbavoor-cabs",
          },
          {
            name: "Delhi airport to Thiruvalla Cab",
            src: "/cab/delhi-airport-to-thiruvalla-cabs",
          },
          {
            name: "Delhi airport to Podili Cab",
            src: "/cab/delhi-airport-to-podili-cabs",
          },
          {
            name: "Delhi airport to Hingoli Cab",
            src: "/cab/delhi-airport-to-hingoli-cabs",
          },
          {
            name: "Delhi airport to Lucknow Cab",
            src: "/cab/delhi-airport-to-lucknow-cabs",
          },
          {
            name: "Delhi airport to Lalru Cab",
            src: "/cab/delhi-airport-to-lalru-cabs",
          },
          {
            name: "Delhi airport to Khandala Cab",
            src: "/cab/delhi-airport-to-khandala-cabs",
          },
          {
            name: "Delhi airport to Kenjar Cab",
            src: "/cab/delhi-airport-to-kenjar-cabs",
          },
          {
            name: "Delhi airport to Thrissur Cab",
            src: "/cab/delhi-airport-to-thrissur-cabs",
          },
          {
            name: "Delhi airport to Omkareshwar Cab",
            src: "/cab/delhi-airport-to-omkareshwar-cabs",
          },
          {
            name: "Delhi airport to Hazaribagh Cab",
            src: "/cab/delhi-airport-to-hazaribagh-cabs",
          },
          {
            name: "Delhi airport to Gaya Cab",
            src: "/cab/delhi-airport-to-gaya-cabs",
          },
          {
            name: "Delhi airport to Palani Cab",
            src: "/cab/delhi-airport-to-palani-cabs",
          },
          {
            name: "Delhi airport to Sadulpur Cab",
            src: "/cab/delhi-airport-to-sadulpur-cabs",
          },
          {
            name: "Delhi airport to Nimapara Cab",
            src: "/cab/delhi-airport-to-nimapara-cabs",
          },
          {
            name: "Delhi airport to Palacode Cab",
            src: "/cab/delhi-airport-to-palacode-cabs",
          },
          {
            name: "Delhi airport to Mangrulpir Cab",
            src: "/cab/delhi-airport-to-mangrulpir-cabs",
          },
          {
            name: "Delhi airport to Boko Cab",
            src: "/cab/delhi-airport-to-boko-cabs",
          },
          {
            name: "Delhi airport to Thiruvarur Cab",
            src: "/cab/delhi-airport-to-thiruvarur-cabs",
          },
          {
            name: "Delhi airport to Siddapur Cab",
            src: "/cab/delhi-airport-to-siddapur-cabs",
          },
          {
            name: "Delhi airport to Indore Cab",
            src: "/cab/delhi-airport-to-indore-cabs",
          },
          {
            name: "Delhi airport to Holenarasipur Cab",
            src: "/cab/delhi-airport-to-holenarasipur-cabs",
          },
          {
            name: "Delhi airport to Charama Cab",
            src: "/cab/delhi-airport-to-charama-cabs",
          },
          {
            name: "Delhi airport to Gairatganj Cab",
            src: "/cab/delhi-airport-to-gairatganj-cabs",
          },
          {
            name: "Delhi airport to Garhakota Cab",
            src: "/cab/delhi-airport-to-garhakota-cabs",
          },
          {
            name: "Delhi airport to Gonda Cab",
            src: "/cab/delhi-airport-to-gonda-cabs",
          },
          {
            name: "Delhi airport to Hanumana Cab",
            src: "/cab/delhi-airport-to-hanumana-cabs",
          },
          {
            name: "Delhi airport to Ponda Cab",
            src: "/cab/delhi-airport-to-ponda-cabs",
          },
          {
            name: "Delhi airport to Laharpur Cab",
            src: "/cab/delhi-airport-to-laharpur-cabs",
          },
          {
            name: "Delhi airport to Jaunpur Cab",
            src: "/cab/delhi-airport-to-jaunpur-cabs",
          },
          {
            name: "Delhi airport to Bara Bazar Cab",
            src: "/cab/delhi-airport-to-bara-bazar-cabs",
          },
          {
            name: "Delhi airport to Batlagundu Cab",
            src: "/cab/delhi-airport-to-batlagundu-cabs",
          },
          {
            name: "Delhi airport to Dwarahat Cab",
            src: "/cab/delhi-airport-to-dwarahat-cabs",
          },
          {
            name: "Delhi airport to Raebareli Cab",
            src: "/cab/delhi-airport-to-raebareli-cabs",
          },
          {
            name: "Delhi airport to Ilayangudi Cab",
            src: "/cab/delhi-airport-to-ilayangudi-cabs",
          },
          {
            name: "Delhi airport to Lingsugur Cab",
            src: "/cab/delhi-airport-to-lingsugur-cabs",
          },
          {
            name: "Delhi airport to Kulathur Cab",
            src: "/cab/delhi-airport-to-kulathur-cabs",
          },
          {
            name: "Delhi airport to Chandigarh Cab",
            src: "/cab/delhi-airport-to-chandigarh-cabs",
          },
          {
            name: "Delhi airport to Mundargi Cab",
            src: "/cab/delhi-airport-to-mundargi-cabs",
          },
          {
            name: "Delhi airport to Guruvayoor Cab",
            src: "/cab/delhi-airport-to-guruvayoor-cabs",
          },
          {
            name: "Delhi airport to Bhupalsagar Cab",
            src: "/cab/delhi-airport-to-bhupalsagar-cabs",
          },
          {
            name: "Delhi airport to Virpur Cab",
            src: "/cab/delhi-airport-to-virpur-cabs",
          },
          {
            name: "Delhi airport to Godhra Cab",
            src: "/cab/delhi-airport-to-godhra-cabs",
          },
          {
            name: "Delhi airport to Gadarwara Cab",
            src: "/cab/delhi-airport-to-gadarwara-cabs",
          },
          {
            name: "Delhi airport to Trivandrum Cab",
            src: "/cab/delhi-airport-to-trivandrum-cabs",
          },
          {
            name: "Delhi airport to Jammikunta Cab",
            src: "/cab/delhi-airport-to-jammikunta-cabs",
          },
          {
            name: "Delhi airport to Inkollu Cab",
            src: "/cab/delhi-airport-to-inkollu-cabs",
          },
          {
            name: "Delhi airport to Bishungarh Cab",
            src: "/cab/delhi-airport-to-bishungarh-cabs",
          },
          {
            name: "Delhi airport to Dahanu Cab",
            src: "/cab/delhi-airport-to-dahanu-cabs",
          },
          {
            name: "Delhi airport to Nimach Cab",
            src: "/cab/delhi-airport-to-nimach-cabs",
          },
          {
            name: "Delhi airport to Nandigama Cab",
            src: "/cab/delhi-airport-to-nandigama-cabs",
          },
          {
            name: "Delhi airport to Viramgam Cab",
            src: "/cab/delhi-airport-to-viramgam-cabs",
          },
          {
            name: "Delhi airport to Kolar Cab",
            src: "/cab/delhi-airport-to-kolar-cabs",
          },
          {
            name: "Delhi airport to Naharkatia Cab",
            src: "/cab/delhi-airport-to-naharkatia-cabs",
          },
          {
            name: "Delhi airport to Madhugiri Cab",
            src: "/cab/delhi-airport-to-madhugiri-cabs",
          },
          {
            name: "Delhi airport to Panna Cab",
            src: "/cab/delhi-airport-to-panna-cabs",
          },
          {
            name: "Delhi airport to Sangli Cab",
            src: "/cab/delhi-airport-to-sangli-cabs",
          },
          {
            name: "Delhi airport to Nadia Cab",
            src: "/cab/delhi-airport-to-nadia-cabs",
          },
          {
            name: "Delhi airport to Sinnar Cab",
            src: "/cab/delhi-airport-to-sinnar-cabs",
          },
          {
            name: "Delhi airport to Rajampet Cab",
            src: "/cab/delhi-airport-to-rajampet-cabs",
          },
          {
            name: "Delhi airport to Tirupattur Cab",
            src: "/cab/delhi-airport-to-tirupattur-cabs",
          },
          {
            name: "Delhi airport to Vythiri Cab",
            src: "/cab/delhi-airport-to-vythiri-cabs",
          },
          {
            name: "Delhi airport to Sardhana Cab",
            src: "/cab/delhi-airport-to-sardhana-cabs",
          },
          {
            name: "Delhi airport to Nalagarh Cab",
            src: "/cab/delhi-airport-to-nalagarh-cabs",
          },
          {
            name: "Delhi airport to Andole Cab",
            src: "/cab/delhi-airport-to-andole-cabs",
          },
          {
            name: "Delhi airport to Malda Cab",
            src: "/cab/delhi-airport-to-malda-cabs",
          },
        ],
      },
    },
    Agra: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Agra",
        links: [
          {
            name: "Agra to Delhi Cab",
            src: "/cab/agra-to-delhi-cabs",
          },
          {
            name: "Agra to Noida Cab",
            src: "/cab/agra-to-noida-cabs",
          },
          {
            name: "Agra to Faridabad Cab",
            src: "/cab/agra-to-faridabad-cabs",
          },
          {
            name: "Agra to Ghaziabad Cab",
            src: "/cab/agra-to-ghaziabad-cabs",
          },
          {
            name: "Agra to Gurgaon Cab",
            src: "/cab/agra-to-gurgaon-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Agra",
        links: [
          {
            name: "Taxi service in Shamshabad",
            src: "/cab/shamshabad-city-cabs",
          },
          {
            name: "Taxi service in Kagarol",
            src: "/cab/kagarol-city-cabs",
          },
          {
            name: "Taxi service in Sadabad",
            src: "/cab/sadabad-city-cabs",
          },
          {
            name: "Taxi service in Bisawar",
            src: "/cab/bisawar-city-cabs",
          },
          {
            name: "Taxi service in Tundla",
            src: "/cab/tundla-city-cabs",
          },
          {
            name: "Taxi service in Rajakhera",
            src: "/cab/rajakhera-city-cabs",
          },
          {
            name: "Taxi service in Fatehpur Sikri",
            src: "/cab/fatehpur-sikri-city-cabs",
          },
          {
            name: "Taxi service in Firozabad",
            src: "/cab/firozabad-city-cabs",
          },
          {
            name: "Taxi service in Jalesar",
            src: "/cab/jalesar-city-cabs",
          },
          {
            name: "Taxi service in Hathras",
            src: "/cab/hathras-city-cabs",
          },
          {
            name: "Taxi service in Mathura",
            src: "/cab/mathura-city-cabs",
          },
          {
            name: "Taxi service in Bharatpur",
            src: "/cab/bharatpur-city-cabs",
          },
          {
            name: "Taxi service in Dholpur",
            src: "/cab/dholpur-city-cabs",
          },
          {
            name: "Taxi service in Vrindavan",
            src: "/cab/vrindavan-city-cabs",
          },
          {
            name: "Taxi service in Ambah",
            src: "/cab/ambah-city-cabs",
          },
          {
            name: "Taxi service in Shikohabad",
            src: "/cab/shikohabad-city-cabs",
          },
          {
            name: "Taxi service in Holipura",
            src: "/cab/holipura-city-cabs",
          },
          {
            name: "Taxi service in Sasni",
            src: "/cab/sasni-city-cabs",
          },
          {
            name: "Taxi service in Iglas",
            src: "/cab/iglas-city-cabs",
          },
          {
            name: "Taxi service in Govardhan",
            src: "/cab/govardhan-city-cabs",
          },
        ],
      },
    },
    Jaipur: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Jaipur",
        links: [
          {
            name: "Jaipur to Delhi Cab",
            src: "/cab/jaipur-to-delhi-cabs",
          },
          {
            name: "Jaipur To Gurgaon Cab",
            src: "/cab/jaipur-to-gurgaon-cabs",
          },
          {
            name: "Jaipur To Noida Cab",
            src: "/cab/jaipur-to-noida-cabs",
          },
          {
            name: "Jaipur to Faridabad Cab",
            src: "/cab/jaipur-to-faridabad-cabs",
          },
          {
            name: "Jaipur To Ghaziabad Cab",
            src: "/cab/jaipur-to-ghaziabad-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Jaipur",
        links: [
          {
            name: "Taxi service in Shekhawati",
            src: "/cab/shekhawati-city-cabs",
          },
          {
            name: "Taxi service in Kukas",
            src: "/cab/kukas-city-cabs",
          },
          {
            name: "Taxi service in Bhambhoria",
            src: "/cab/bhambhoria-city-cabs",
          },
          {
            name: "Taxi service in Begas",
            src: "/cab/begas-city-cabs",
          },
          {
            name: "Taxi service in Bassi",
            src: "/cab/bassi-city-cabs",
          },
          {
            name: "Taxi service in Achrol",
            src: "/cab/achrol-city-cabs",
          },
          {
            name: "Taxi service in Chomu",
            src: "/cab/chomu-city-cabs",
          },
          {
            name: "Taxi service in Asalpur Jobner",
            src: "/cab/asalpur-jobner-city-cabs",
          },
          {
            name: "Taxi service in Chaksu",
            src: "/cab/chaksu-city-cabs",
          },
          {
            name: "Taxi service in Pawta",
            src: "/cab/pawta-city-cabs",
          },
          {
            name: "Taxi service in Jobner",
            src: "/cab/jobner-city-cabs",
          },
          {
            name: "Taxi service in Alila Fort Bishangarh",
            src: "/cab/alila-fort-bishangarh-city-cabs",
          },
          {
            name: "Taxi service in Mojamabaad",
            src: "/cab/mojamabaad-city-cabs",
          },
          {
            name: "Taxi service in Renwal",
            src: "/cab/renwal-city-cabs",
          },
          {
            name: "Taxi service in Mehandipur Balaji",
            src: "/cab/mehandipur-balaji-city-cabs",
          },
          {
            name: "Taxi service in Dausa",
            src: "/cab/dausa-city-cabs",
          },
          {
            name: "Taxi service in Virat Nagar",
            src: "/cab/virat-nagar-city-cabs",
          },
          {
            name: "Taxi service in Shahpura",
            src: "/cab/shahpura-city-cabs",
          },
          {
            name: "Taxi service in Ringas",
            src: "/cab/ringas-city-cabs",
          },
          {
            name: "Taxi service in Khatu Shyam",
            src: "/cab/khatu-shyam-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Jaipur airport",
        links: [
          {
            name: "Jaipur airport to Rasipuram Cab",
            src: "/cab/jaipur-airport-to-rasipuram-cabs",
          },
          {
            name: "Jaipur airport to Kuchesar Cab",
            src: "/cab/jaipur-airport-to-kuchesar-cabs",
          },
          {
            name: "Jaipur airport to Kuttalam Cab",
            src: "/cab/jaipur-airport-to-kuttalam-cabs",
          },
          {
            name: "Jaipur airport to Pandhurna Cab",
            src: "/cab/jaipur-airport-to-pandhurna-cabs",
          },
          {
            name: "Jaipur airport to Faridkot Cab",
            src: "/cab/jaipur-airport-to-faridkot-cabs",
          },
          {
            name: "Jaipur airport to Ahmedpur Cab",
            src: "/cab/jaipur-airport-to-ahmedpur-cabs",
          },
          {
            name: "Jaipur airport to Chunar Cab",
            src: "/cab/jaipur-airport-to-chunar-cabs",
          },
          {
            name: "Jaipur airport to Nilambur Cab",
            src: "/cab/jaipur-airport-to-nilambur-cabs",
          },
          {
            name: "Jaipur airport to Ranni Cab",
            src: "/cab/jaipur-airport-to-ranni-cabs",
          },
          {
            name: "Jaipur airport to Godhra Cab",
            src: "/cab/jaipur-airport-to-godhra-cabs",
          },
          {
            name: "Jaipur airport to Tumsar Cab",
            src: "/cab/jaipur-airport-to-tumsar-cabs",
          },
          {
            name: "Jaipur airport to Nokha Cab",
            src: "/cab/jaipur-airport-to-nokha-cabs",
          },
          {
            name: "Jaipur airport to Chhibramau Cab",
            src: "/cab/jaipur-airport-to-chhibramau-cabs",
          },
          {
            name: "Jaipur airport to Surathkal Cab",
            src: "/cab/jaipur-airport-to-surathkal-cabs",
          },
          {
            name: "Jaipur airport to Bara Bazar Cab",
            src: "/cab/jaipur-airport-to-bara-bazar-cabs",
          },
          {
            name: "Jaipur airport to Umred Cab",
            src: "/cab/jaipur-airport-to-umred-cabs",
          },
          {
            name: "Jaipur airport to Samana Cab",
            src: "/cab/jaipur-airport-to-samana-cabs",
          },
          {
            name: "Jaipur airport to Madurai Cab",
            src: "/cab/jaipur-airport-to-madurai-cabs",
          },
          {
            name: "Jaipur airport to Sriperumbudur Cab",
            src: "/cab/jaipur-airport-to-sriperumbudur-cabs",
          },
          {
            name: "Jaipur airport to Ongole Cab",
            src: "/cab/jaipur-airport-to-ongole-cabs",
          },
          {
            name: "Jaipur airport to Nashik Cab",
            src: "/cab/jaipur-airport-to-nashik-cabs",
          },
          {
            name: "Jaipur airport to Mandawa Cab",
            src: "/cab/jaipur-airport-to-mandawa-cabs",
          },
          {
            name: "Jaipur airport to Panchla Cab",
            src: "/cab/jaipur-airport-to-panchla-cabs",
          },
          {
            name: "Jaipur airport to Mangrol Cab",
            src: "/cab/jaipur-airport-to-mangrol-cabs",
          },
          {
            name: "Jaipur airport to Cachar Cab",
            src: "/cab/jaipur-airport-to-cachar-cabs",
          },
          {
            name: "Jaipur airport to Manjhi Cab",
            src: "/cab/jaipur-airport-to-manjhi-cabs",
          },
          {
            name: "Jaipur airport to Rajagangapur Cab",
            src: "/cab/jaipur-airport-to-rajagangapur-cabs",
          },
          {
            name: "Jaipur airport to Sidhauli Cab",
            src: "/cab/jaipur-airport-to-sidhauli-cabs",
          },
          {
            name: "Jaipur airport to Kalka Cab",
            src: "/cab/jaipur-airport-to-kalka-cabs",
          },
          {
            name: "Jaipur airport to Bodhan Cab",
            src: "/cab/jaipur-airport-to-bodhan-cabs",
          },
          {
            name: "Jaipur airport to Auli Cab",
            src: "/cab/jaipur-airport-to-auli-cabs",
          },
          {
            name: "Jaipur airport to Chotila Cab",
            src: "/cab/jaipur-airport-to-chotila-cabs",
          },
          {
            name: "Jaipur airport to Sasan Gir Cab",
            src: "/cab/jaipur-airport-to-sasan-gir-cabs",
          },
          {
            name: "Jaipur airport to Amroha Cab",
            src: "/cab/jaipur-airport-to-amroha-cabs",
          },
          {
            name: "Jaipur airport to Madanapalle Cab",
            src: "/cab/jaipur-airport-to-madanapalle-cabs",
          },
          {
            name: "Jaipur airport to Shravanabelagola Cab",
            src: "/cab/jaipur-airport-to-shravanabelagola-cabs",
          },
          {
            name: "Jaipur airport to Muddebihal Cab",
            src: "/cab/jaipur-airport-to-muddebihal-cabs",
          },
          {
            name: "Jaipur airport to Sillod Cab",
            src: "/cab/jaipur-airport-to-sillod-cabs",
          },
          {
            name: "Jaipur airport to Majuli Cab",
            src: "/cab/jaipur-airport-to-majuli-cabs",
          },
          {
            name: "Jaipur airport to Tadepalligudem Cab",
            src: "/cab/jaipur-airport-to-tadepalligudem-cabs",
          },
          {
            name: "Jaipur airport to Patrasayer Cab",
            src: "/cab/jaipur-airport-to-patrasayer-cabs",
          },
          {
            name: "Jaipur airport to Mahemdabad Cab",
            src: "/cab/jaipur-airport-to-mahemdabad-cabs",
          },
          {
            name: "Jaipur airport to Basopatti Cab",
            src: "/cab/jaipur-airport-to-basopatti-cabs",
          },
          {
            name: "Jaipur airport to Giridih Cab",
            src: "/cab/jaipur-airport-to-giridih-cabs",
          },
          {
            name: "Jaipur airport to Muvattupuzha Cab",
            src: "/cab/jaipur-airport-to-muvattupuzha-cabs",
          },
          {
            name: "Jaipur airport to Kaithal Cab",
            src: "/cab/jaipur-airport-to-kaithal-cabs",
          },
          {
            name: "Jaipur airport to Alipore Cab",
            src: "/cab/jaipur-airport-to-alipore-cabs",
          },
          {
            name: "Jaipur airport to Bagepalli Cab",
            src: "/cab/jaipur-airport-to-bagepalli-cabs",
          },
          {
            name: "Jaipur airport to Contai Cab",
            src: "/cab/jaipur-airport-to-contai-cabs",
          },
          {
            name: "Jaipur airport to Rajam Cab",
            src: "/cab/jaipur-airport-to-rajam-cabs",
          },
          {
            name: "Jaipur airport to Lalganj Cab",
            src: "/cab/jaipur-airport-to-lalganj-cabs",
          },
          {
            name: "Jaipur airport to Velayuthampalayam Cab",
            src: "/cab/jaipur-airport-to-velayuthampalayam-cabs",
          },
          {
            name: "Jaipur airport to Wayanad Cab",
            src: "/cab/jaipur-airport-to-wayanad-cabs",
          },
          {
            name: "Jaipur airport to Taliparamba Cab",
            src: "/cab/jaipur-airport-to-taliparamba-cabs",
          },
          {
            name: "Jaipur airport to Biswan Cab",
            src: "/cab/jaipur-airport-to-biswan-cabs",
          },
          {
            name: "Jaipur airport to Chakki Cab",
            src: "/cab/jaipur-airport-to-chakki-cabs",
          },
          {
            name: "Jaipur airport to Bardez Cab",
            src: "/cab/jaipur-airport-to-bardez-cabs",
          },
          {
            name: "Jaipur airport to Kalimpong Cab",
            src: "/cab/jaipur-airport-to-kalimpong-cabs",
          },
          {
            name: "Jaipur airport to Valia Cab",
            src: "/cab/jaipur-airport-to-valia-cabs",
          },
          {
            name: "Jaipur airport to Palakollu Cab",
            src: "/cab/jaipur-airport-to-palakollu-cabs",
          },
          {
            name: "Jaipur airport to Palwal Cab",
            src: "/cab/jaipur-airport-to-palwal-cabs",
          },
          {
            name: "Jaipur airport to Nagoor Cab",
            src: "/cab/jaipur-airport-to-nagoor-cabs",
          },
          {
            name: "Jaipur airport to Canacona Cab",
            src: "/cab/jaipur-airport-to-canacona-cabs",
          },
          {
            name: "Jaipur airport to Kharkhoda Cab",
            src: "/cab/jaipur-airport-to-kharkhoda-cabs",
          },
          {
            name: "Jaipur airport to Kapasan Cab",
            src: "/cab/jaipur-airport-to-kapasan-cabs",
          },
          {
            name: "Jaipur airport to Mehandipur Balaji Cab",
            src: "/cab/jaipur-airport-to-mehandipur-balaji-cabs",
          },
          {
            name: "Jaipur airport to Cheyur Cab",
            src: "/cab/jaipur-airport-to-cheyur-cabs",
          },
          {
            name: "Jaipur airport to Gangavathi Cab",
            src: "/cab/jaipur-airport-to-gangavathi-cabs",
          },
          {
            name: "Jaipur airport to Rasra Cab",
            src: "/cab/jaipur-airport-to-rasra-cabs",
          },
          {
            name: "Jaipur airport to Baga Cab",
            src: "/cab/jaipur-airport-to-baga-cabs",
          },
          {
            name: "Jaipur airport to Jagdishpur Cab",
            src: "/cab/jaipur-airport-to-jagdishpur-cabs",
          },
          {
            name: "Jaipur airport to Ujire Cab",
            src: "/cab/jaipur-airport-to-ujire-cabs",
          },
          {
            name: "Jaipur airport to Angamaly Cab",
            src: "/cab/jaipur-airport-to-angamaly-cabs",
          },
          {
            name: "Jaipur airport to Kankroli Cab",
            src: "/cab/jaipur-airport-to-kankroli-cabs",
          },
          {
            name: "Jaipur airport to Sardhana Cab",
            src: "/cab/jaipur-airport-to-sardhana-cabs",
          },
          {
            name: "Jaipur airport to Vizianagaram Cab",
            src: "/cab/jaipur-airport-to-vizianagaram-cabs",
          },
          {
            name: "Jaipur airport to Pilibhit Cab",
            src: "/cab/jaipur-airport-to-pilibhit-cabs",
          },
          {
            name: "Jaipur airport to Behror Cab",
            src: "/cab/jaipur-airport-to-behror-cabs",
          },
          {
            name: "Jaipur airport to Fekamari Cab",
            src: "/cab/jaipur-airport-to-fekamari-cabs",
          },
          {
            name: "Jaipur airport to Limkheda Cab",
            src: "/cab/jaipur-airport-to-limkheda-cabs",
          },
          {
            name: "Jaipur airport to Kumbakonam Cab",
            src: "/cab/jaipur-airport-to-kumbakonam-cabs",
          },
          {
            name: "Jaipur airport to Shahbad Cab",
            src: "/cab/jaipur-airport-to-shahbad-cabs",
          },
          {
            name: "Jaipur airport to Robertsganj Cab",
            src: "/cab/jaipur-airport-to-robertsganj-cabs",
          },
          {
            name: "Jaipur airport to Beas Cab",
            src: "/cab/jaipur-airport-to-beas-cabs",
          },
          {
            name: "Jaipur airport to Karapa Cab",
            src: "/cab/jaipur-airport-to-karapa-cabs",
          },
          {
            name: "Jaipur airport to Sahibzada Ajit Singh Nagar Cab",
            src: "/cab/jaipur-airport-to-sahibzada-ajit-singh-nagar-cabs",
          },
          {
            name: "Jaipur airport to Zahirabad Cab",
            src: "/cab/jaipur-airport-to-zahirabad-cabs",
          },
          {
            name: "Jaipur airport to Keshpur Cab",
            src: "/cab/jaipur-airport-to-keshpur-cabs",
          },
          {
            name: "Jaipur airport to Lakkavaram Cab",
            src: "/cab/jaipur-airport-to-lakkavaram-cabs",
          },
          {
            name: "Jaipur airport to Sullurupeta Cab",
            src: "/cab/jaipur-airport-to-sullurupeta-cabs",
          },
          {
            name: "Jaipur airport to Kotputli Cab",
            src: "/cab/jaipur-airport-to-kotputli-cabs",
          },
          {
            name: "Jaipur airport to Beed Cab",
            src: "/cab/jaipur-airport-to-beed-cabs",
          },
          {
            name: "Jaipur airport to Tirunelveli Cab",
            src: "/cab/jaipur-airport-to-tirunelveli-cabs",
          },
          {
            name: "Jaipur airport to Sendhwa Cab",
            src: "/cab/jaipur-airport-to-sendhwa-cabs",
          },
          {
            name: "Jaipur airport to Pandhurna Cab",
            src: "/cab/jaipur-airport-to-pandhurna-cabs",
          },
          {
            name: "Jaipur airport to Chengam Cab",
            src: "/cab/jaipur-airport-to-chengam-cabs",
          },
          {
            name: "Jaipur airport to Vadakkenchery Cab",
            src: "/cab/jaipur-airport-to-vadakkenchery-cabs",
          },
          {
            name: "Jaipur airport to Katra Cab",
            src: "/cab/jaipur-airport-to-katra-cabs",
          },
          {
            name: "Jaipur airport to Nabadwip Cab",
            src: "/cab/jaipur-airport-to-nabadwip-cabs",
          },
          {
            name: "Jaipur airport to Indergarh Cab",
            src: "/cab/jaipur-airport-to-indergarh-cabs",
          },
        ],
      },
    },
    Pune: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Pune",
        links: [
          {
            name: "Pune to Mumbai Cab",
            src: "/cab/pune-to-mumbai-cabs",
          },
          {
            name: "Pune to Shirdi Cab",
            src: "/cab/pune-to-shirdi-cabs",
          },
          {
            name: "Pune to Mahabaleshwar Cab",
            src: "/cab/pune-to-mahabaleshwar-cabs",
          },
          {
            name: "Pune to Nashik Cab",
            src: "/cab/pune-to-nashik-cabs",
          },
          {
            name: "Pune to Aurangabad Cab",
            src: "/cab/pune-to-aurangabad-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Pune",
        links: [
          {
            name: "Taxi service in Pimpri Chinchwad",
            src: "/cab/pimpri-chinchwad-city-cabs",
          },
          {
            name: "Taxi service in Induri",
            src: "/cab/induri-city-cabs",
          },
          {
            name: "Taxi service in Talegaon",
            src: "/cab/talegaon-city-cabs",
          },
          {
            name: "Taxi service in Shikrapur",
            src: "/cab/shikrapur-city-cabs",
          },
          {
            name: "Taxi service in Lavasa",
            src: "/cab/lavasa-city-cabs",
          },
          {
            name: "Taxi service in Bhor",
            src: "/cab/bhor-city-cabs",
          },
          {
            name: "Taxi service in Jejuri",
            src: "/cab/jejuri-city-cabs",
          },
          {
            name: "Taxi service in Pawna Lake",
            src: "/cab/pawna-lake-city-cabs",
          },
          {
            name: "Taxi service in Shirval",
            src: "/cab/shirval-city-cabs",
          },
          {
            name: "Taxi service in Aamby Valley",
            src: "/cab/aamby-valley-city-cabs",
          },
          {
            name: "Taxi service in Raigad",
            src: "/cab/raigad-city-cabs",
          },
          {
            name: "Taxi service in Lonavala",
            src: "/cab/lonavala-city-cabs",
          },
          {
            name: "Taxi service in Manchar",
            src: "/cab/manchar-city-cabs",
          },
          {
            name: "Taxi service in Khandala",
            src: "/cab/khandala-city-cabs",
          },
          {
            name: "Taxi service in Kedagaon",
            src: "/cab/kedagaon-city-cabs",
          },
          {
            name: "Taxi service in Imagica Adlab",
            src: "/cab/imagica-adlab-city-cabs",
          },
          {
            name: "Taxi service in Khopoli",
            src: "/cab/khopoli-city-cabs",
          },
          {
            name: "Taxi service in Shirur",
            src: "/cab/shirur-city-cabs",
          },
          {
            name: "Taxi service in Imagica",
            src: "/cab/imagica-city-cabs",
          },
          {
            name: "Taxi service in Panchgani",
            src: "/cab/panchgani-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Pune airport",
        links: [
          {
            name: "Pune airport to Bombay Cab",
            src: "/cab/pune-airport-to-bombay-cabs",
          },
          {
            name: "Pune airport to Cherthala Cab",
            src: "/cab/pune-airport-to-cherthala-cabs",
          },
          {
            name: "Pune airport to Alwar Cab",
            src: "/cab/pune-airport-to-alwar-cabs",
          },
          {
            name: "Pune airport to Kanakapura Cab",
            src: "/cab/pune-airport-to-kanakapura-cabs",
          },
          {
            name: "Pune airport to Giddalur Cab",
            src: "/cab/pune-airport-to-giddalur-cabs",
          },
          {
            name: "Pune airport to Thisayanvilai Cab",
            src: "/cab/pune-airport-to-thisayanvilai-cabs",
          },
          {
            name: "Pune airport to Sabarimala Cab",
            src: "/cab/pune-airport-to-sabarimala-cabs",
          },
          {
            name: "Pune airport to Jagraon Cab",
            src: "/cab/pune-airport-to-jagraon-cabs",
          },
          {
            name: "Pune airport to Madhogarh Cab",
            src: "/cab/pune-airport-to-madhogarh-cabs",
          },
          {
            name: "Pune airport to Kot Kapura Cab",
            src: "/cab/pune-airport-to-kot-kapura-cabs",
          },
          {
            name: "Pune airport to Sunabeda Cab",
            src: "/cab/pune-airport-to-sunabeda-cabs",
          },
          {
            name: "Pune airport to Bhiloda Cab",
            src: "/cab/pune-airport-to-bhiloda-cabs",
          },
          {
            name: "Pune airport to Mundargi Cab",
            src: "/cab/pune-airport-to-mundargi-cabs",
          },
          {
            name: "Pune airport to Atmakur Cab",
            src: "/cab/pune-airport-to-atmakur-cabs",
          },
          {
            name: "Pune airport to Nedumangad Cab",
            src: "/cab/pune-airport-to-nedumangad-cabs",
          },
          {
            name: "Pune airport to Gajendragadh Cab",
            src: "/cab/pune-airport-to-gajendragadh-cabs",
          },
          {
            name: "Pune airport to Sahibzada Ajit Singh Nagar Cab",
            src: "/cab/pune-airport-to-sahibzada-ajit-singh-nagar-cabs",
          },
          {
            name: "Pune airport to Sindkhed Raja Cab",
            src: "/cab/pune-airport-to-sindkhed-raja-cabs",
          },
          {
            name: "Pune airport to Churhat Cab",
            src: "/cab/pune-airport-to-churhat-cabs",
          },
          {
            name: "Pune airport to Joypur Cab",
            src: "/cab/pune-airport-to-joypur-cabs",
          },
          {
            name: "Pune airport to Dausa Cab",
            src: "/cab/pune-airport-to-dausa-cabs",
          },
          {
            name: "Pune airport to Barhi Cab",
            src: "/cab/pune-airport-to-barhi-cabs",
          },
          {
            name: "Pune airport to Pithapuram Cab",
            src: "/cab/pune-airport-to-pithapuram-cabs",
          },
          {
            name: "Pune airport to Karur Cab",
            src: "/cab/pune-airport-to-karur-cabs",
          },
          {
            name: "Pune airport to Anakapalle Cab",
            src: "/cab/pune-airport-to-anakapalle-cabs",
          },
          {
            name: "Pune airport to Zirakpur Cab",
            src: "/cab/pune-airport-to-zirakpur-cabs",
          },
          {
            name: "Pune airport to Nilakottai Cab",
            src: "/cab/pune-airport-to-nilakottai-cabs",
          },
          {
            name: "Pune airport to Benares Cab",
            src: "/cab/pune-airport-to-benares-cabs",
          },
          {
            name: "Pune airport to Kundapura Cab",
            src: "/cab/pune-airport-to-kundapura-cabs",
          },
          {
            name: "Pune airport to Tirumala Cab",
            src: "/cab/pune-airport-to-tirumala-cabs",
          },
          {
            name: "Pune airport to Kandla Cab",
            src: "/cab/pune-airport-to-kandla-cabs",
          },
          {
            name: "Pune airport to Patti Cab",
            src: "/cab/pune-airport-to-patti-cabs",
          },
          {
            name: "Pune airport to Rupnagar Cab",
            src: "/cab/pune-airport-to-rupnagar-cabs",
          },
          {
            name: "Pune airport to Gooty Cab",
            src: "/cab/pune-airport-to-gooty-cabs",
          },
          {
            name: "Pune airport to Bisauli Cab",
            src: "/cab/pune-airport-to-bisauli-cabs",
          },
          {
            name: "Pune airport to Navsari Cab",
            src: "/cab/pune-airport-to-navsari-cabs",
          },
          {
            name: "Pune airport to Junagarh Cab",
            src: "/cab/pune-airport-to-junagarh-cabs",
          },
          {
            name: "Pune airport to Hosur Cab",
            src: "/cab/pune-airport-to-hosur-cabs",
          },
          {
            name: "Pune airport to Bhadrak Cab",
            src: "/cab/pune-airport-to-bhadrak-cabs",
          },
          {
            name: "Pune airport to Ashta Cab",
            src: "/cab/pune-airport-to-ashta-cabs",
          },
          {
            name: "Pune airport to Dabhoi Cab",
            src: "/cab/pune-airport-to-dabhoi-cabs",
          },
          {
            name: "Pune airport to Sardarpur Cab",
            src: "/cab/pune-airport-to-sardarpur-cabs",
          },
          {
            name: "Pune airport to Tenkasi Cab",
            src: "/cab/pune-airport-to-tenkasi-cabs",
          },
          {
            name: "Pune airport to Chitrakoot Cab",
            src: "/cab/pune-airport-to-chitrakoot-cabs",
          },
          {
            name: "Pune airport to Kattumannarkoil Cab",
            src: "/cab/pune-airport-to-kattumannarkoil-cabs",
          },
          {
            name: "Pune airport to Bilgram Cab",
            src: "/cab/pune-airport-to-bilgram-cabs",
          },
          {
            name: "Pune airport to Mount Abu Cab",
            src: "/cab/pune-airport-to-mount-abu-cabs",
          },
          {
            name: "Pune airport to Pindwara Cab",
            src: "/cab/pune-airport-to-pindwara-cabs",
          },
          {
            name: "Pune airport to Kallakurichi Cab",
            src: "/cab/pune-airport-to-kallakurichi-cabs",
          },
          {
            name: "Pune airport to Haflong Cab",
            src: "/cab/pune-airport-to-haflong-cabs",
          },
          {
            name: "Pune airport to Hubballi Cab",
            src: "/cab/pune-airport-to-hubballi-cabs",
          },
          {
            name: "Pune airport to Khed Cab",
            src: "/cab/pune-airport-to-khed-cabs",
          },
          {
            name: "Pune airport to Bagalkot Cab",
            src: "/cab/pune-airport-to-bagalkot-cabs",
          },
          {
            name: "Pune airport to Kutch Cab",
            src: "/cab/pune-airport-to-kutch-cabs",
          },
          {
            name: "Pune airport to Piduguralla Cab",
            src: "/cab/pune-airport-to-piduguralla-cabs",
          },
          {
            name: "Pune airport to Mayiladuthurai Cab",
            src: "/cab/pune-airport-to-mayiladuthurai-cabs",
          },
          {
            name: "Pune airport to Kodinar Cab",
            src: "/cab/pune-airport-to-kodinar-cabs",
          },
          {
            name: "Pune airport to Calicut Cab",
            src: "/cab/pune-airport-to-calicut-cabs",
          },
          {
            name: "Pune airport to Karad Cab",
            src: "/cab/pune-airport-to-karad-cabs",
          },
          {
            name: "Pune airport to Dhar Cab",
            src: "/cab/pune-airport-to-dhar-cabs",
          },
          {
            name: "Pune airport to Begusarai Cab",
            src: "/cab/pune-airport-to-begusarai-cabs",
          },
          {
            name: "Pune airport to Bellary Cab",
            src: "/cab/pune-airport-to-bellary-cabs",
          },
          {
            name: "Pune airport to Pandalam Cab",
            src: "/cab/pune-airport-to-pandalam-cabs",
          },
          {
            name: "Pune airport to Khajjiar Cab",
            src: "/cab/pune-airport-to-khajjiar-cabs",
          },
          {
            name: "Pune airport to Keonjhar Cab",
            src: "/cab/pune-airport-to-keonjhar-cabs",
          },
          {
            name: "Pune airport to Gohad Cab",
            src: "/cab/pune-airport-to-gohad-cabs",
          },
          {
            name: "Pune airport to Sarmera Cab",
            src: "/cab/pune-airport-to-sarmera-cabs",
          },
          {
            name: "Pune airport to Yellapur Cab",
            src: "/cab/pune-airport-to-yellapur-cabs",
          },
          {
            name: "Pune airport to Bawal Cab",
            src: "/cab/pune-airport-to-bawal-cabs",
          },
          {
            name: "Pune airport to Madurantakam Cab",
            src: "/cab/pune-airport-to-madurantakam-cabs",
          },
          {
            name: "Pune airport to Sheopur Cab",
            src: "/cab/pune-airport-to-sheopur-cabs",
          },
          {
            name: "Pune airport to Chengalpattu Cab",
            src: "/cab/pune-airport-to-chengalpattu-cabs",
          },
          {
            name: "Pune airport to Binsar Cab",
            src: "/cab/pune-airport-to-binsar-cabs",
          },
          {
            name: "Pune airport to Perambalur Cab",
            src: "/cab/pune-airport-to-perambalur-cabs",
          },
          {
            name: "Pune airport to Golaghat Cab",
            src: "/cab/pune-airport-to-golaghat-cabs",
          },
          {
            name: "Pune airport to Jodhpur Cab",
            src: "/cab/pune-airport-to-jodhpur-cabs",
          },
          {
            name: "Pune airport to Khammam Cab",
            src: "/cab/pune-airport-to-khammam-cabs",
          },
          {
            name: "Pune airport to Bareilly Cab",
            src: "/cab/pune-airport-to-bareilly-cabs",
          },
          {
            name: "Pune airport to Fatehpur Cab",
            src: "/cab/pune-airport-to-fatehpur-cabs",
          },
          {
            name: "Pune airport to Chikballapur Cab",
            src: "/cab/pune-airport-to-chikballapur-cabs",
          },
          {
            name: "Pune airport to Karaikudi Cab",
            src: "/cab/pune-airport-to-karaikudi-cabs",
          },
          {
            name: "Pune airport to Jaggayyapet Cab",
            src: "/cab/pune-airport-to-jaggayyapet-cabs",
          },
          {
            name: "Pune airport to Brahmapur Cab",
            src: "/cab/pune-airport-to-brahmapur-cabs",
          },
          {
            name: "Pune airport to Daudnagar Cab",
            src: "/cab/pune-airport-to-daudnagar-cabs",
          },
          {
            name: "Pune airport to Ambernath Cab",
            src: "/cab/pune-airport-to-ambernath-cabs",
          },
          {
            name: "Pune airport to Nohar Cab",
            src: "/cab/pune-airport-to-nohar-cabs",
          },
          {
            name: "Pune airport to Malkapur Cab",
            src: "/cab/pune-airport-to-malkapur-cabs",
          },
          {
            name: "Pune airport to Narkand Cab",
            src: "/cab/pune-airport-to-narkand-cabs",
          },
          {
            name: "Pune airport to Valia Cab",
            src: "/cab/pune-airport-to-valia-cabs",
          },
          {
            name: "Pune airport to Ellora Cab",
            src: "/cab/pune-airport-to-ellora-cabs",
          },
          {
            name: "Pune airport to Badlapur Cab",
            src: "/cab/pune-airport-to-badlapur-cabs",
          },
          {
            name: "Pune airport to Panaji Cab",
            src: "/cab/pune-airport-to-panaji-cabs",
          },
          {
            name: "Pune airport to Dharwad Cab",
            src: "/cab/pune-airport-to-dharwad-cabs",
          },
          {
            name: "Pune airport to Pusad Cab",
            src: "/cab/pune-airport-to-pusad-cabs",
          },
          {
            name: "Pune airport to Rewari Cab",
            src: "/cab/pune-airport-to-rewari-cabs",
          },
          {
            name: "Pune airport to Jabalpur Cab",
            src: "/cab/pune-airport-to-jabalpur-cabs",
          },
          {
            name: "Pune airport to Karkal Cab",
            src: "/cab/pune-airport-to-karkal-cabs",
          },
          {
            name: "Pune airport to Sriperumbudur Cab",
            src: "/cab/pune-airport-to-sriperumbudur-cabs",
          },
          {
            name: "Pune airport to Trivandrum Cab",
            src: "/cab/pune-airport-to-trivandrum-cabs",
          },
        ],
      },
    },
    Mumbai: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Mumbai",
        links: [
          {
            name: "Mumbai to Pune Cab",
            src: "/cab/mumbai-to-pune-cabs",
          },
          {
            name: "Mumbai to Nashik Cab",
            src: "/cab/mumbai-to-nashik-cabs",
          },
          {
            name: "Mumbai to Shirdi Cab",
            src: "/cab/mumbai-to-shirdi-cabs",
          },
          {
            name: "Mumbai to Lonavala Cab",
            src: "/cab/mumbai-to-lonavala-cabs",
          },
          {
            name: "Mumbai to Mahabaleshwar Cab",
            src: "/cab/mumbai-to-mahabaleshwar-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Mumbai",
        links: [
          {
            name: "Taxi service in LTT",
            src: "/cab/ltt-city-cabs",
          },
          {
            name: "Taxi service in Andheri",
            src: "/cab/andheri-city-cabs",
          },
          {
            name: "Taxi service in Navi Mumbai",
            src: "/cab/navi-mumbai-city-cabs",
          },
          {
            name: "Taxi service in Thane",
            src: "/cab/thane-city-cabs",
          },
          {
            name: "Taxi service in Mira Bhayandar",
            src: "/cab/mira-bhayandar-city-cabs",
          },
          {
            name: "Taxi service in New Panvel",
            src: "/cab/new-panvel-city-cabs",
          },
          {
            name: "Taxi service in Panvel",
            src: "/cab/panvel-city-cabs",
          },
          {
            name: "Taxi service in Dombivli",
            src: "/cab/dombivli-city-cabs",
          },
          {
            name: "Taxi service in Bhiwandi",
            src: "/cab/bhiwandi-city-cabs",
          },
          {
            name: "Taxi service in Kalyan",
            src: "/cab/kalyan-city-cabs",
          },
          {
            name: "Taxi service in Ambernath",
            src: "/cab/ambernath-city-cabs",
          },
          {
            name: "Taxi service in Vasai",
            src: "/cab/vasai-city-cabs",
          },
          {
            name: "Taxi service in Badalapur",
            src: "/cab/badalapur-city-cabs",
          },
          {
            name: "Taxi service in Matheran",
            src: "/cab/matheran-city-cabs",
          },
          {
            name: "Taxi service in Aman Lodge",
            src: "/cab/aman-lodge-city-cabs",
          },
          {
            name: "Taxi service in Virar",
            src: "/cab/virar-city-cabs",
          },
          {
            name: "Taxi service in Alibag",
            src: "/cab/alibag-city-cabs",
          },
          {
            name: "Taxi service in Neral",
            src: "/cab/neral-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Mumbai airport",
        links: [
          {
            name: "Mumbai airport to Gondia Cab",
            src: "/cab/mumbai-airport-to-gondia-cabs",
          },
          {
            name: "Mumbai airport to Balod Cab",
            src: "/cab/mumbai-airport-to-balod-cabs",
          },
          {
            name: "Mumbai airport to Vangoor Cab",
            src: "/cab/mumbai-airport-to-vangoor-cabs",
          },
          {
            name: "Mumbai airport to Kanipakam Cab",
            src: "/cab/mumbai-airport-to-kanipakam-cabs",
          },
          {
            name: "Mumbai airport to Bongaigaon Cab",
            src: "/cab/mumbai-airport-to-bongaigaon-cabs",
          },
          {
            name: "Mumbai airport to Unchahar Cab",
            src: "/cab/mumbai-airport-to-unchahar-cabs",
          },
          {
            name: "Mumbai airport to Khamgaon Cab",
            src: "/cab/mumbai-airport-to-khamgaon-cabs",
          },
          {
            name: "Mumbai airport to Kota Cab",
            src: "/cab/mumbai-airport-to-kota-cabs",
          },
          {
            name: "Mumbai airport to Ghatkesar Cab",
            src: "/cab/mumbai-airport-to-ghatkesar-cabs",
          },
          {
            name: "Mumbai airport to Mahasamund Cab",
            src: "/cab/mumbai-airport-to-mahasamund-cabs",
          },
          {
            name: "Mumbai airport to Bondapalli Cab",
            src: "/cab/mumbai-airport-to-bondapalli-cabs",
          },
          {
            name: "Mumbai airport to Rohat Cab",
            src: "/cab/mumbai-airport-to-rohat-cabs",
          },
          {
            name: "Mumbai airport to Gohad Cab",
            src: "/cab/mumbai-airport-to-gohad-cabs",
          },
          {
            name: "Mumbai airport to Kharagpur Cab",
            src: "/cab/mumbai-airport-to-kharagpur-cabs",
          },
          {
            name: "Mumbai airport to Ankola Cab",
            src: "/cab/mumbai-airport-to-ankola-cabs",
          },
          {
            name: "Mumbai airport to Kashipur Cab",
            src: "/cab/mumbai-airport-to-kashipur-cabs",
          },
          {
            name: "Mumbai airport to Bomdila Cab",
            src: "/cab/mumbai-airport-to-bomdila-cabs",
          },
          {
            name: "Mumbai airport to Kenjar Cab",
            src: "/cab/mumbai-airport-to-kenjar-cabs",
          },
          {
            name: "Mumbai airport to Kausani Cab",
            src: "/cab/mumbai-airport-to-kausani-cabs",
          },
          {
            name: "Mumbai airport to Kanyakumari Cab",
            src: "/cab/mumbai-airport-to-kanyakumari-cabs",
          },
          {
            name: "Mumbai airport to Medinipur Cab",
            src: "/cab/mumbai-airport-to-medinipur-cabs",
          },
          {
            name: "Mumbai airport to Sambhal Cab",
            src: "/cab/mumbai-airport-to-sambhal-cabs",
          },
          {
            name: "Mumbai airport to Mahabaleshwar Cab",
            src: "/cab/mumbai-airport-to-mahabaleshwar-cabs",
          },
          {
            name: "Mumbai airport to Bardez Cab",
            src: "/cab/mumbai-airport-to-bardez-cabs",
          },
          {
            name: "Mumbai airport to Begusarai Cab",
            src: "/cab/mumbai-airport-to-begusarai-cabs",
          },
          {
            name: "Mumbai airport to Guruvayoor Cab",
            src: "/cab/mumbai-airport-to-guruvayoor-cabs",
          },
          {
            name: "Mumbai airport to Adoor Cab",
            src: "/cab/mumbai-airport-to-adoor-cabs",
          },
          {
            name: "Mumbai airport to Sivakasi Cab",
            src: "/cab/mumbai-airport-to-sivakasi-cabs",
          },
          {
            name: "Mumbai airport to Gopikandar Cab",
            src: "/cab/mumbai-airport-to-gopikandar-cabs",
          },
          {
            name: "Mumbai airport to Tijara Cab",
            src: "/cab/mumbai-airport-to-tijara-cabs",
          },
          {
            name: "Mumbai airport to Bilasipara Cab",
            src: "/cab/mumbai-airport-to-bilasipara-cabs",
          },
          {
            name: "Mumbai airport to Khatu Cab",
            src: "/cab/mumbai-airport-to-khatu-cabs",
          },
          {
            name: "Mumbai airport to Shegaon Cab",
            src: "/cab/mumbai-airport-to-shegaon-cabs",
          },
          {
            name: "Mumbai airport to Assandh Cab",
            src: "/cab/mumbai-airport-to-assandh-cabs",
          },
          {
            name: "Mumbai airport to Peraiyur Cab",
            src: "/cab/mumbai-airport-to-peraiyur-cabs",
          },
          {
            name: "Mumbai airport to Padubidre Cab",
            src: "/cab/mumbai-airport-to-padubidre-cabs",
          },
          {
            name: "Mumbai airport to Shrirampur Cab",
            src: "/cab/mumbai-airport-to-shrirampur-cabs",
          },
          {
            name: "Mumbai airport to Manachanallur Cab",
            src: "/cab/mumbai-airport-to-manachanallur-cabs",
          },
          {
            name: "Mumbai airport to Palavancha Cab",
            src: "/cab/mumbai-airport-to-palavancha-cabs",
          },
          {
            name: "Mumbai airport to Kot Kapura Cab",
            src: "/cab/mumbai-airport-to-kot-kapura-cabs",
          },
          {
            name: "Mumbai airport to Igatpuri Cab",
            src: "/cab/mumbai-airport-to-igatpuri-cabs",
          },
          {
            name: "Mumbai airport to Ranthambhore Cab",
            src: "/cab/mumbai-airport-to-ranthambhore-cabs",
          },
          {
            name: "Mumbai airport to Pochampalli Cab",
            src: "/cab/mumbai-airport-to-pochampalli-cabs",
          },
          {
            name: "Mumbai airport to Dantiwada Cab",
            src: "/cab/mumbai-airport-to-dantiwada-cabs",
          },
          {
            name: "Mumbai airport to Jeypore Cab",
            src: "/cab/mumbai-airport-to-jeypore-cabs",
          },
          {
            name: "Mumbai airport to Palamau Cab",
            src: "/cab/mumbai-airport-to-palamau-cabs",
          },
          {
            name: "Mumbai airport to Barmer Cab",
            src: "/cab/mumbai-airport-to-barmer-cabs",
          },
          {
            name: "Mumbai airport to Etah Cab",
            src: "/cab/mumbai-airport-to-etah-cabs",
          },
          {
            name: "Mumbai airport to Tilhar Cab",
            src: "/cab/mumbai-airport-to-tilhar-cabs",
          },
          {
            name: "Mumbai airport to Orai Cab",
            src: "/cab/mumbai-airport-to-orai-cabs",
          },
          {
            name: "Mumbai airport to Bhatar Cab",
            src: "/cab/mumbai-airport-to-bhatar-cabs",
          },
          {
            name: "Mumbai airport to Kolhapur Cab",
            src: "/cab/mumbai-airport-to-kolhapur-cabs",
          },
          {
            name: "Mumbai airport to Annavaram Cab",
            src: "/cab/mumbai-airport-to-annavaram-cabs",
          },
          {
            name: "Mumbai airport to Jaisalmer Cab",
            src: "/cab/mumbai-airport-to-jaisalmer-cabs",
          },
          {
            name: "Mumbai airport to Barsahi Cab",
            src: "/cab/mumbai-airport-to-barsahi-cabs",
          },
          {
            name: "Mumbai airport to Chauri Chaura Cab",
            src: "/cab/mumbai-airport-to-chauri-chaura-cabs",
          },
          {
            name: "Mumbai airport to Budaun Cab",
            src: "/cab/mumbai-airport-to-budaun-cabs",
          },
          {
            name: "Mumbai airport to Pernem Cab",
            src: "/cab/mumbai-airport-to-pernem-cabs",
          },
          {
            name: "Mumbai airport to Bhograi Cab",
            src: "/cab/mumbai-airport-to-bhograi-cabs",
          },
          {
            name: "Mumbai airport to Panruti Cab",
            src: "/cab/mumbai-airport-to-panruti-cabs",
          },
          {
            name: "Mumbai airport to Dahanu Cab",
            src: "/cab/mumbai-airport-to-dahanu-cabs",
          },
          {
            name: "Mumbai airport to Pimpri Chinchwad Cab",
            src: "/cab/mumbai-airport-to-pimpri-chinchwad-cabs",
          },
          {
            name: "Mumbai airport to Nawalgarh Cab",
            src: "/cab/mumbai-airport-to-nawalgarh-cabs",
          },
          {
            name: "Mumbai airport to Bahraich Cab",
            src: "/cab/mumbai-airport-to-bahraich-cabs",
          },
          {
            name: "Mumbai airport to Anna Road Cab",
            src: "/cab/mumbai-airport-to-anna-road-cabs",
          },
          {
            name: "Mumbai airport to Una Cab",
            src: "/cab/mumbai-airport-to-una-cabs",
          },
          {
            name: "Mumbai airport to Banswara Cab",
            src: "/cab/mumbai-airport-to-banswara-cabs",
          },
          {
            name: "Mumbai airport to Tawang Cab",
            src: "/cab/mumbai-airport-to-tawang-cabs",
          },
          {
            name: "Mumbai airport to Khushkhera Cab",
            src: "/cab/mumbai-airport-to-khushkhera-cabs",
          },
          {
            name: "Mumbai airport to Charkhi Dadri Cab",
            src: "/cab/mumbai-airport-to-charkhi-dadri-cabs",
          },
          {
            name: "Mumbai airport to Akividu Cab",
            src: "/cab/mumbai-airport-to-akividu-cabs",
          },
          {
            name: "Mumbai airport to Lakkavaram Cab",
            src: "/cab/mumbai-airport-to-lakkavaram-cabs",
          },
          {
            name: "Mumbai airport to Menhdawal Cab",
            src: "/cab/mumbai-airport-to-menhdawal-cabs",
          },
          {
            name: "Mumbai airport to Mathabhanga Cab",
            src: "/cab/mumbai-airport-to-mathabhanga-cabs",
          },
          {
            name: "Mumbai airport to Songadh Cab",
            src: "/cab/mumbai-airport-to-songadh-cabs",
          },
          {
            name: "Mumbai airport to Hooghly Cab",
            src: "/cab/mumbai-airport-to-hooghly-cabs",
          },
          {
            name: "Mumbai airport to Bayad Cab",
            src: "/cab/mumbai-airport-to-bayad-cabs",
          },
          {
            name: "Mumbai airport to Bidupur Cab",
            src: "/cab/mumbai-airport-to-bidupur-cabs",
          },
          {
            name: "Mumbai airport to Joypur Cab",
            src: "/cab/mumbai-airport-to-joypur-cabs",
          },
          {
            name: "Mumbai airport to Guhla Cab",
            src: "/cab/mumbai-airport-to-guhla-cabs",
          },
          {
            name: "Mumbai airport to Khunti Cab",
            src: "/cab/mumbai-airport-to-khunti-cabs",
          },
          {
            name: "Mumbai airport to Dhubri Cab",
            src: "/cab/mumbai-airport-to-dhubri-cabs",
          },
          {
            name: "Mumbai airport to Tonk Cab",
            src: "/cab/mumbai-airport-to-tonk-cabs",
          },
          {
            name: "Mumbai airport to Balaghat Cab",
            src: "/cab/mumbai-airport-to-balaghat-cabs",
          },
          {
            name: "Mumbai airport to Sarmera Cab",
            src: "/cab/mumbai-airport-to-sarmera-cabs",
          },
          {
            name: "Mumbai airport to Osmanabad Cab",
            src: "/cab/mumbai-airport-to-osmanabad-cabs",
          },
          {
            name: "Mumbai airport to Kakinada Cab",
            src: "/cab/mumbai-airport-to-kakinada-cabs",
          },
          {
            name: "Mumbai airport to Gwalior Cab",
            src: "/cab/mumbai-airport-to-gwalior-cabs",
          },
          {
            name: "Mumbai airport to Kottayam Cab",
            src: "/cab/mumbai-airport-to-kottayam-cabs",
          },
          {
            name: "Mumbai airport to Gingee Cab",
            src: "/cab/mumbai-airport-to-gingee-cabs",
          },
          {
            name: "Mumbai airport to Sivaganga Cab",
            src: "/cab/mumbai-airport-to-sivaganga-cabs",
          },
          {
            name: "Mumbai airport to Prathipadu Cab",
            src: "/cab/mumbai-airport-to-prathipadu-cabs",
          },
          {
            name: "Mumbai airport to Ramtek Cab",
            src: "/cab/mumbai-airport-to-ramtek-cabs",
          },
          {
            name: "Mumbai airport to Ottapalam Cab",
            src: "/cab/mumbai-airport-to-ottapalam-cabs",
          },
          {
            name: "Mumbai airport to Veraval Cab",
            src: "/cab/mumbai-airport-to-veraval-cabs",
          },
          {
            name: "Mumbai airport to Thasra Cab",
            src: "/cab/mumbai-airport-to-thasra-cabs",
          },
          {
            name: "Mumbai airport to Samastipur Cab",
            src: "/cab/mumbai-airport-to-samastipur-cabs",
          },
          {
            name: "Mumbai airport to Gangoh Cab",
            src: "/cab/mumbai-airport-to-gangoh-cabs",
          },
          {
            name: "Mumbai airport to Pachora Cab",
            src: "/cab/mumbai-airport-to-pachora-cabs",
          },
          {
            name: "Mumbai airport to Yuksom Cab",
            src: "/cab/mumbai-airport-to-yuksom-cabs",
          },
        ],
      },
    },
    Chandigarh: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Chandigarh",
        links: [
          {
            name: "Chandigarh to Delhi Cab",
            src: "/cab/chandigarh-to-delhi-cabs",
          },
          {
            name: "Chandigarh to Shimla Cab",
            src: "/cab/chandigarh-to-shimla-cabs",
          },
          {
            name: "Chandigarh to Manali Cab",
            src: "/cab/chandigarh-to-manali-cabs",
          },
          {
            name: "Chandigarh to Gurgaon Cab",
            src: "/cab/chandigarh-to-gurgaon-cabs",
          },
          {
            name: "Chandigarh to Noida Cab",
            src: "/cab/chandigarh-to-noida-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Chandigarh",
        links: [
          {
            name: "Taxi service in Mohali",
            src: "/cab/mohali-city-cabs",
          },
          {
            name: "Taxi service in Sahibzada Ajit Singh Nagar",
            src: "/cab/sahibzada-ajit-singh-nagar-city-cabs",
          },
          {
            name: "Taxi service in Panchkula",
            src: "/cab/panchkula-city-cabs",
          },
          {
            name: "Taxi service in Zira",
            src: "/cab/zira-city-cabs",
          },
          {
            name: "Taxi service in Zirakpur",
            src: "/cab/zirakpur-city-cabs",
          },
          {
            name: "Taxi service in Kharar",
            src: "/cab/kharar-city-cabs",
          },
          {
            name: "Taxi service in Darpan",
            src: "/cab/darpan-city-cabs",
          },
          {
            name: "Taxi service in Dera Bassi",
            src: "/cab/dera-bassi-city-cabs",
          },
          {
            name: "Taxi service in Kalka",
            src: "/cab/kalka-city-cabs",
          },
          {
            name: "Taxi service in Parwanoo",
            src: "/cab/parwanoo-city-cabs",
          },
          {
            name: "Taxi service in Kurali",
            src: "/cab/kurali-city-cabs",
          },
          {
            name: "Taxi service in Baddi",
            src: "/cab/baddi-city-cabs",
          },
          {
            name: "Taxi service in Kasauli",
            src: "/cab/kasauli-city-cabs",
          },
          {
            name: "Taxi service in Lalru",
            src: "/cab/lalru-city-cabs",
          },
          {
            name: "Taxi service in Barog",
            src: "/cab/barog-city-cabs",
          },
          {
            name: "Taxi service in Rajpur",
            src: "/cab/rajpur-city-cabs",
          },
          {
            name: "Taxi service in Rajpura",
            src: "/cab/rajpura-city-cabs",
          },
          {
            name: "Taxi service in Nalagarh",
            src: "/cab/nalagarh-city-cabs",
          },
          {
            name: "Taxi service in Ropar",
            src: "/cab/ropar-city-cabs",
          },
          {
            name: "Taxi service in Rupnagar",
            src: "/cab/rupnagar-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Chandigarh airport",
        links: [
          {
            name: "Chandigarh airport to Talegaon Cab",
            src: "/cab/chandigarh-airport-to-talegaon-cabs",
          },
          {
            name: "Chandigarh airport to Baga Cab",
            src: "/cab/chandigarh-airport-to-baga-cabs",
          },
          {
            name: "Chandigarh airport to Tilhar Cab",
            src: "/cab/chandigarh-airport-to-tilhar-cabs",
          },
          {
            name: "Chandigarh airport to Jim Corbett National Park Cab",
            src: "/cab/chandigarh-airport-to-jim-corbett-national-park-cabs",
          },
          {
            name: "Chandigarh airport to Saputara Cab",
            src: "/cab/chandigarh-airport-to-saputara-cabs",
          },
          {
            name: "Chandigarh airport to Pilani Cab",
            src: "/cab/chandigarh-airport-to-pilani-cabs",
          },
          {
            name: "Chandigarh airport to Darjeeling Cab",
            src: "/cab/chandigarh-airport-to-darjeeling-cabs",
          },
          {
            name: "Chandigarh airport to Tikamgarh Cab",
            src: "/cab/chandigarh-airport-to-tikamgarh-cabs",
          },
          {
            name: "Chandigarh airport to Haveri Cab",
            src: "/cab/chandigarh-airport-to-haveri-cabs",
          },
          {
            name: "Chandigarh airport to Guntakal Cab",
            src: "/cab/chandigarh-airport-to-guntakal-cabs",
          },
          {
            name: "Chandigarh airport to Bishrampur Cab",
            src: "/cab/chandigarh-airport-to-bishrampur-cabs",
          },
          {
            name: "Chandigarh airport to Greater Noida Cab",
            src: "/cab/chandigarh-airport-to-greater-noida-cabs",
          },
          {
            name: "Chandigarh airport to Tijara Cab",
            src: "/cab/chandigarh-airport-to-tijara-cabs",
          },
          {
            name: "Chandigarh airport to Latur Cab",
            src: "/cab/chandigarh-airport-to-latur-cabs",
          },
          {
            name: "Chandigarh airport to Danta Cab",
            src: "/cab/chandigarh-airport-to-danta-cabs",
          },
          {
            name: "Chandigarh airport to Thuraiyur Cab",
            src: "/cab/chandigarh-airport-to-thuraiyur-cabs",
          },
          {
            name: "Chandigarh airport to Pantnagar Cab",
            src: "/cab/chandigarh-airport-to-pantnagar-cabs",
          },
          {
            name: "Chandigarh airport to Chennai Cab",
            src: "/cab/chandigarh-airport-to-chennai-cabs",
          },
          {
            name: "Chandigarh airport to Bhavnagar Cab",
            src: "/cab/chandigarh-airport-to-bhavnagar-cabs",
          },
          {
            name: "Chandigarh airport to Ahmednagar Cab",
            src: "/cab/chandigarh-airport-to-ahmednagar-cabs",
          },
          {
            name: "Chandigarh airport to Kankroli Cab",
            src: "/cab/chandigarh-airport-to-kankroli-cabs",
          },
          {
            name: "Chandigarh airport to Hampi Cab",
            src: "/cab/chandigarh-airport-to-hampi-cabs",
          },
          {
            name: "Chandigarh airport to Modasa Cab",
            src: "/cab/chandigarh-airport-to-modasa-cabs",
          },
          {
            name: "Chandigarh airport to Sankarankovil Cab",
            src: "/cab/chandigarh-airport-to-sankarankovil-cabs",
          },
          {
            name: "Chandigarh airport to Ladwa Cab",
            src: "/cab/chandigarh-airport-to-ladwa-cabs",
          },
          {
            name: "Chandigarh airport to Safipur Cab",
            src: "/cab/chandigarh-airport-to-safipur-cabs",
          },
          {
            name: "Chandigarh airport to Menhdawal Cab",
            src: "/cab/chandigarh-airport-to-menhdawal-cabs",
          },
          {
            name: "Chandigarh airport to Mundargi Cab",
            src: "/cab/chandigarh-airport-to-mundargi-cabs",
          },
          {
            name: "Chandigarh airport to Cheyur Cab",
            src: "/cab/chandigarh-airport-to-cheyur-cabs",
          },
          {
            name: "Chandigarh airport to Puranpur Cab",
            src: "/cab/chandigarh-airport-to-puranpur-cabs",
          },
          {
            name: "Chandigarh airport to Piduguralla Cab",
            src: "/cab/chandigarh-airport-to-piduguralla-cabs",
          },
          {
            name: "Chandigarh airport to Dharampur Cab",
            src: "/cab/chandigarh-airport-to-dharampur-cabs",
          },
          {
            name: "Chandigarh airport to Jangaon Cab",
            src: "/cab/chandigarh-airport-to-jangaon-cabs",
          },
          {
            name: "Chandigarh airport to Narkanda Cab",
            src: "/cab/chandigarh-airport-to-narkanda-cabs",
          },
          {
            name: "Chandigarh airport to Aluva Cab",
            src: "/cab/chandigarh-airport-to-aluva-cabs",
          },
          {
            name: "Chandigarh airport to Surajgarh Cab",
            src: "/cab/chandigarh-airport-to-surajgarh-cabs",
          },
          {
            name: "Chandigarh airport to Khopoli Cab",
            src: "/cab/chandigarh-airport-to-khopoli-cabs",
          },
          {
            name: "Chandigarh airport to Tadimarri Cab",
            src: "/cab/chandigarh-airport-to-tadimarri-cabs",
          },
          {
            name: "Chandigarh airport to Amaravati Cab",
            src: "/cab/chandigarh-airport-to-amaravati-cabs",
          },
          {
            name: "Chandigarh airport to Jalalpur Cab",
            src: "/cab/chandigarh-airport-to-jalalpur-cabs",
          },
          {
            name: "Chandigarh airport to Tulsipur Cab",
            src: "/cab/chandigarh-airport-to-tulsipur-cabs",
          },
          {
            name: "Chandigarh airport to Sattal Cab",
            src: "/cab/chandigarh-airport-to-sattal-cabs",
          },
          {
            name: "Chandigarh airport to Kattappana Cab",
            src: "/cab/chandigarh-airport-to-kattappana-cabs",
          },
          {
            name: "Chandigarh airport to Parwanoo Cab",
            src: "/cab/chandigarh-airport-to-parwanoo-cabs",
          },
          {
            name: "Chandigarh airport to Hathras Cab",
            src: "/cab/chandigarh-airport-to-hathras-cabs",
          },
          {
            name: "Chandigarh airport to Kumta Cab",
            src: "/cab/chandigarh-airport-to-kumta-cabs",
          },
          {
            name: "Chandigarh airport to Kasauli Cab",
            src: "/cab/chandigarh-airport-to-kasauli-cabs",
          },
          {
            name: "Chandigarh airport to Goa Cab",
            src: "/cab/chandigarh-airport-to-goa-cabs",
          },
          {
            name: "Chandigarh airport to Coorg Cab",
            src: "/cab/chandigarh-airport-to-coorg-cabs",
          },
          {
            name: "Chandigarh airport to Palani Cab",
            src: "/cab/chandigarh-airport-to-palani-cabs",
          },
          {
            name: "Chandigarh airport to Nilakottai Cab",
            src: "/cab/chandigarh-airport-to-nilakottai-cabs",
          },
          {
            name: "Chandigarh airport to Gadwal Cab",
            src: "/cab/chandigarh-airport-to-gadwal-cabs",
          },
          {
            name: "Chandigarh airport to Kota Cab",
            src: "/cab/chandigarh-airport-to-kota-cabs",
          },
          {
            name: "Chandigarh airport to Anantapur Cab",
            src: "/cab/chandigarh-airport-to-anantapur-cabs",
          },
          {
            name: "Chandigarh airport to Jaipur Cab",
            src: "/cab/chandigarh-airport-to-jaipur-cabs",
          },
          {
            name: "Chandigarh airport to Kanatal Cab",
            src: "/cab/chandigarh-airport-to-kanatal-cabs",
          },
          {
            name: "Chandigarh airport to Chandwa Cab",
            src: "/cab/chandigarh-airport-to-chandwa-cabs",
          },
          {
            name: "Chandigarh airport to Lateri Cab",
            src: "/cab/chandigarh-airport-to-lateri-cabs",
          },
          {
            name: "Chandigarh airport to Beawar Cab",
            src: "/cab/chandigarh-airport-to-beawar-cabs",
          },
          {
            name: "Chandigarh airport to Jaleswar Cab",
            src: "/cab/chandigarh-airport-to-jaleswar-cabs",
          },
          {
            name: "Chandigarh airport to Imagica Adlab Cab",
            src: "/cab/chandigarh-airport-to-imagica-adlab-cabs",
          },
          {
            name: "Chandigarh airport to Sultanpur Cab",
            src: "/cab/chandigarh-airport-to-sultanpur-cabs",
          },
          {
            name: "Chandigarh airport to Lachung Cab",
            src: "/cab/chandigarh-airport-to-lachung-cabs",
          },
          {
            name: "Chandigarh airport to Palwal Cab",
            src: "/cab/chandigarh-airport-to-palwal-cabs",
          },
          {
            name: "Chandigarh airport to Chandwa Cab",
            src: "/cab/chandigarh-airport-to-chandwa-cabs",
          },
          {
            name: "Chandigarh airport to Ranavav Cab",
            src: "/cab/chandigarh-airport-to-ranavav-cabs",
          },
          {
            name: "Chandigarh airport to Nadaun Cab",
            src: "/cab/chandigarh-airport-to-nadaun-cabs",
          },
          {
            name: "Chandigarh airport to Tumkur Cab",
            src: "/cab/chandigarh-airport-to-tumkur-cabs",
          },
          {
            name: "Chandigarh airport to Silvassa Cab",
            src: "/cab/chandigarh-airport-to-silvassa-cabs",
          },
          {
            name: "Chandigarh airport to Narsapur Cab",
            src: "/cab/chandigarh-airport-to-narsapur-cabs",
          },
          {
            name: "Chandigarh airport to Dabra Cab",
            src: "/cab/chandigarh-airport-to-dabra-cabs",
          },
          {
            name: "Chandigarh airport to Lakhimpur Cab",
            src: "/cab/chandigarh-airport-to-lakhimpur-cabs",
          },
          {
            name: "Chandigarh airport to Dera Baba Nanak Cabs Cab",
            src: "/cab/chandigarh-airport-to-dera-baba-nanak-cabs",
          },
          {
            name: "Chandigarh airport to Patti Cab",
            src: "/cab/chandigarh-airport-to-patti-cabs",
          },
          {
            name: "Chandigarh airport to Cuttack Cab",
            src: "/cab/chandigarh-airport-to-cuttack-cabs",
          },
          {
            name: "Chandigarh airport to Gola Cab",
            src: "/cab/chandigarh-airport-to-gola-cabs",
          },
          {
            name: "Chandigarh airport to Fatehgarh Sahib Cab",
            src: "/cab/chandigarh-airport-to-fatehgarh-sahib-cabs",
          },
          {
            name: "Chandigarh airport to Bhilai Cab",
            src: "/cab/chandigarh-airport-to-bhilai-cabs",
          },
          {
            name: "Chandigarh airport to Paonta Sahib Cab",
            src: "/cab/chandigarh-airport-to-paonta-sahib-cabs",
          },
          {
            name: "Chandigarh airport to Jagadalpur Cab",
            src: "/cab/chandigarh-airport-to-jagadalpur-cabs",
          },
          {
            name: "Chandigarh airport to Palavancha Cab",
            src: "/cab/chandigarh-airport-to-palavancha-cabs",
          },
          {
            name: "Chandigarh airport to Idar Cab",
            src: "/cab/chandigarh-airport-to-idar-cabs",
          },
          {
            name: "Chandigarh airport to Chengannur Cab",
            src: "/cab/chandigarh-airport-to-chengannur-cabs",
          },
          {
            name: "Chandigarh airport to Channapatna Cab",
            src: "/cab/chandigarh-airport-to-channapatna-cabs",
          },
          {
            name: "Chandigarh airport to Ponmudi Cab",
            src: "/cab/chandigarh-airport-to-ponmudi-cabs",
          },
          {
            name: "Chandigarh airport to Veldanda Cab",
            src: "/cab/chandigarh-airport-to-veldanda-cabs",
          },
          {
            name: "Chandigarh airport to Medak Cab",
            src: "/cab/chandigarh-airport-to-medak-cabs",
          },
          {
            name: "Chandigarh airport to Gurh Cab",
            src: "/cab/chandigarh-airport-to-gurh-cabs",
          },
          {
            name: "Chandigarh airport to Manachanallur Cab",
            src: "/cab/chandigarh-airport-to-manachanallur-cabs",
          },
          {
            name: "Chandigarh airport to Poladpur Cab",
            src: "/cab/chandigarh-airport-to-poladpur-cabs",
          },
          {
            name: "Chandigarh airport to Kodungallur Cab",
            src: "/cab/chandigarh-airport-to-kodungallur-cabs",
          },
          {
            name: "Chandigarh airport to Dungarpur Cab",
            src: "/cab/chandigarh-airport-to-dungarpur-cabs",
          },
          {
            name: "Chandigarh airport to Arki Cab",
            src: "/cab/chandigarh-airport-to-arki-cabs",
          },
          {
            name: "Chandigarh airport to Charama Cab",
            src: "/cab/chandigarh-airport-to-charama-cabs",
          },
          {
            name: "Chandigarh airport to Panhala Cab",
            src: "/cab/chandigarh-airport-to-panhala-cabs",
          },
          {
            name: "Chandigarh airport to Pedana Cab",
            src: "/cab/chandigarh-airport-to-pedana-cabs",
          },
          {
            name: "Chandigarh airport to Namchi Cab",
            src: "/cab/chandigarh-airport-to-namchi-cabs",
          },
          {
            name: "Chandigarh airport to Sidlaghatta Cab",
            src: "/cab/chandigarh-airport-to-sidlaghatta-cabs",
          },
          {
            name: "Chandigarh airport to Sihor Cab",
            src: "/cab/chandigarh-airport-to-sihor-cabs",
          },
        ],
      },
    },
    Bangalore: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Bangalore",
        links: [
          {
            name: "Bangalore to Ooty Cab",
            src: "/cab/bangalore-to-ooty-cabs",
          },
          {
            name: "Bangalore to Madikeri Cab",
            src: "/cab/bangalore-to-madikeri-cabs",
          },
          {
            name: "Bangalore to Coorg Cab",
            src: "/cab/bangalore-to-coorg-cabs",
          },
          {
            name: "Bangalore to Vellore Cab",
            src: "/cab/bangalore-to-vellore-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Bangalore",
        links: [
          {
            name: "Taxi service in Hoskote",
            src: "/cab/hoskote-city-cabs",
          },
          {
            name: "Taxi service in Nelamangala",
            src: "/cab/nelamangala-city-cabs",
          },
          {
            name: "Taxi service in Bangalore Rural",
            src: "/cab/bangalore-rural-city-cabs",
          },
          {
            name: "Taxi service in Hosur",
            src: "/cab/hosur-city-cabs",
          },
          {
            name: "Taxi service in Dodballapur",
            src: "/cab/dodballapur-city-cabs",
          },
          {
            name: "Taxi service in Malur",
            src: "/cab/malur-city-cabs",
          },
          {
            name: "Taxi service in Magadi",
            src: "/cab/magadi-city-cabs",
          },
          {
            name: "Taxi service in Ramanagara",
            src: "/cab/ramanagara-city-cabs",
          },
          {
            name: "Taxi service in Nandi Hills",
            src: "/cab/nandi-hills-city-cabs",
          },
          {
            name: "Taxi service in Kanakapura",
            src: "/cab/kanakapura-city-cabs",
          },
          {
            name: "Taxi service in Chikballapur",
            src: "/cab/chikballapur-city-cabs",
          },
          {
            name: "Taxi service in Chikkaballapur",
            src: "/cab/chikkaballapur-city-cabs",
          },
          {
            name: "Taxi service in Denkanikottai",
            src: "/cab/denkanikottai-city-cabs",
          },
          {
            name: "Taxi service in Channapatna",
            src: "/cab/channapatna-city-cabs",
          },
          {
            name: "Taxi service in Sidlaghatta",
            src: "/cab/sidlaghatta-city-cabs",
          },
          {
            name: "Taxi service in Shoolagiri",
            src: "/cab/shoolagiri-city-cabs",
          },
          {
            name: "Taxi service in Kodagu",
            src: "/cab/kodagu-city-cabs",
          },
          {
            name: "Taxi service in Kolar",
            src: "/cab/kolar-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Bangalore airport",
        links: [
          {
            name: "Bangalore airport to Naharlagun Cab",
            src: "/cab/bangalore-airport-to-naharlagun-cabs",
          },
          {
            name: "Bangalore airport to Kishanganj Cab",
            src: "/cab/bangalore-airport-to-kishanganj-cabs",
          },
          {
            name: "Bangalore airport to Modinagar Cab",
            src: "/cab/bangalore-airport-to-modinagar-cabs",
          },
          {
            name: "Bangalore airport to Vadakkenchery Cab",
            src: "/cab/bangalore-airport-to-vadakkenchery-cabs",
          },
          {
            name: "Bangalore airport to Veppanthattai Cab",
            src: "/cab/bangalore-airport-to-veppanthattai-cabs",
          },
          {
            name: "Bangalore airport to Sardarpur Cab",
            src: "/cab/bangalore-airport-to-sardarpur-cabs",
          },
          {
            name: "Bangalore airport to Munnar Cab",
            src: "/cab/bangalore-airport-to-munnar-cabs",
          },
          {
            name: "Bangalore airport to Purulia Cab",
            src: "/cab/bangalore-airport-to-purulia-cabs",
          },
          {
            name: "Bangalore airport to Malegaon Cab",
            src: "/cab/bangalore-airport-to-malegaon-cabs",
          },
          {
            name: "Bangalore airport to Mahabalipuram Cab",
            src: "/cab/bangalore-airport-to-mahabalipuram-cabs",
          },
          {
            name: "Bangalore airport to Vadodara Cab",
            src: "/cab/bangalore-airport-to-vadodara-cabs",
          },
          {
            name: "Bangalore airport to Udumbanchola Cab",
            src: "/cab/bangalore-airport-to-udumbanchola-cabs",
          },
          {
            name: "Bangalore airport to Bathinda Cab",
            src: "/cab/bangalore-airport-to-bathinda-cabs",
          },
          {
            name: "Bangalore airport to Kakinada Cab",
            src: "/cab/bangalore-airport-to-kakinada-cabs",
          },
          {
            name: "Bangalore airport to Adra Cab",
            src: "/cab/bangalore-airport-to-adra-cabs",
          },
          {
            name: "Bangalore airport to Nagoor Cab",
            src: "/cab/bangalore-airport-to-nagoor-cabs",
          },
          {
            name: "Bangalore airport to Kanjirapally Cab",
            src: "/cab/bangalore-airport-to-kanjirapally-cabs",
          },
          {
            name: "Bangalore airport to Nakhatrana Cab",
            src: "/cab/bangalore-airport-to-nakhatrana-cabs",
          },
          {
            name: "Bangalore airport to Patrasayer Cab",
            src: "/cab/bangalore-airport-to-patrasayer-cabs",
          },
          {
            name: "Bangalore airport to Imphal Cab",
            src: "/cab/bangalore-airport-to-imphal-cabs",
          },
          {
            name: "Bangalore airport to Ayodhya Cab",
            src: "/cab/bangalore-airport-to-ayodhya-cabs",
          },
          {
            name: "Bangalore airport to Bisalpur Cab",
            src: "/cab/bangalore-airport-to-bisalpur-cabs",
          },
          {
            name: "Bangalore airport to Udalguri Cab",
            src: "/cab/bangalore-airport-to-udalguri-cabs",
          },
          {
            name: "Bangalore airport to Kalimpong Cab",
            src: "/cab/bangalore-airport-to-kalimpong-cabs",
          },
          {
            name: "Bangalore airport to Coimbatore Cab",
            src: "/cab/bangalore-airport-to-coimbatore-cabs",
          },
          {
            name: "Bangalore airport to Kaveripattinam Cab",
            src: "/cab/bangalore-airport-to-kaveripattinam-cabs",
          },
          {
            name: "Bangalore airport to Laluk Cab",
            src: "/cab/bangalore-airport-to-laluk-cabs",
          },
          {
            name: "Bangalore airport to Shivamogga Cab",
            src: "/cab/bangalore-airport-to-shivamogga-cabs",
          },
          {
            name: "Bangalore airport to Champaran Cab",
            src: "/cab/bangalore-airport-to-champaran-cabs",
          },
          {
            name: "Bangalore airport to Ulundurpet Cab",
            src: "/cab/bangalore-airport-to-ulundurpet-cabs",
          },
          {
            name: "Bangalore airport to Tumkur Cab",
            src: "/cab/bangalore-airport-to-tumkur-cabs",
          },
          {
            name: "Bangalore airport to Trimbak Cab",
            src: "/cab/bangalore-airport-to-trimbak-cabs",
          },
          {
            name: "Bangalore airport to Pandavapura Cab",
            src: "/cab/bangalore-airport-to-pandavapura-cabs",
          },
          {
            name: "Bangalore airport to Nandura Cab",
            src: "/cab/bangalore-airport-to-nandura-cabs",
          },
          {
            name: "Bangalore airport to Miryalaguda Cab",
            src: "/cab/bangalore-airport-to-miryalaguda-cabs",
          },
          {
            name: "Bangalore airport to Nalagarh Cab",
            src: "/cab/bangalore-airport-to-nalagarh-cabs",
          },
          {
            name: "Bangalore airport to Sohna Cab",
            src: "/cab/bangalore-airport-to-sohna-cabs",
          },
          {
            name: "Bangalore airport to Neemrana Cab",
            src: "/cab/bangalore-airport-to-neemrana-cabs",
          },
          {
            name: "Bangalore airport to Sendhwa Cab",
            src: "/cab/bangalore-airport-to-sendhwa-cabs",
          },
          {
            name: "Bangalore airport to Karaikal Cab",
            src: "/cab/bangalore-airport-to-karaikal-cabs",
          },
          {
            name: "Bangalore airport to Zahirabad Cab",
            src: "/cab/bangalore-airport-to-zahirabad-cabs",
          },
          {
            name: "Bangalore airport to Ichak Cab",
            src: "/cab/bangalore-airport-to-ichak-cabs",
          },
          {
            name: "Bangalore airport to Pantnagar Cab",
            src: "/cab/bangalore-airport-to-pantnagar-cabs",
          },
          {
            name: "Bangalore airport to Dehra Gopipur Cab",
            src: "/cab/bangalore-airport-to-dehra-gopipur-cabs",
          },
          {
            name: "Bangalore airport to Dhamdha Cab",
            src: "/cab/bangalore-airport-to-dhamdha-cabs",
          },
          {
            name: "Bangalore airport to Harda Cab",
            src: "/cab/bangalore-airport-to-harda-cabs",
          },
          {
            name: "Bangalore airport to Nagari Cab",
            src: "/cab/bangalore-airport-to-nagari-cabs",
          },
          {
            name: "Bangalore airport to Chikmagalur Cab",
            src: "/cab/bangalore-airport-to-chikmagalur-cabs",
          },
          {
            name: "Bangalore airport to Theni Cab",
            src: "/cab/bangalore-airport-to-theni-cabs",
          },
          {
            name: "Bangalore airport to Zuluk Cab",
            src: "/cab/bangalore-airport-to-zuluk-cabs",
          },
          {
            name: "Bangalore airport to Venkatagiri Cab",
            src: "/cab/bangalore-airport-to-venkatagiri-cabs",
          },
          {
            name: "Bangalore airport to Sankhavaram Cab",
            src: "/cab/bangalore-airport-to-sankhavaram-cabs",
          },
          {
            name: "Bangalore airport to Latur Cab",
            src: "/cab/bangalore-airport-to-latur-cabs",
          },
          {
            name: "Bangalore airport to Jhunjhunu Cab",
            src: "/cab/bangalore-airport-to-jhunjhunu-cabs",
          },
          {
            name: "Bangalore airport to Sadasivpet Cab",
            src: "/cab/bangalore-airport-to-sadasivpet-cabs",
          },
          {
            name: "Bangalore airport to Chidambaram Cab",
            src: "/cab/bangalore-airport-to-chidambaram-cabs",
          },
          {
            name: "Bangalore airport to Shiggaon Cab",
            src: "/cab/bangalore-airport-to-shiggaon-cabs",
          },
          {
            name: "Bangalore airport to Manbazar Cab",
            src: "/cab/bangalore-airport-to-manbazar-cabs",
          },
          {
            name: "Bangalore airport to Rameswaram Cab",
            src: "/cab/bangalore-airport-to-rameswaram-cabs",
          },
          {
            name: "Bangalore airport to Rajnagar Cab",
            src: "/cab/bangalore-airport-to-rajnagar-cabs",
          },
          {
            name: "Bangalore airport to Nedumangad Cab",
            src: "/cab/bangalore-airport-to-nedumangad-cabs",
          },
          {
            name: "Bangalore airport to Vizianagaram Cab",
            src: "/cab/bangalore-airport-to-vizianagaram-cabs",
          },
          {
            name: "Bangalore airport to Shahdol Cab",
            src: "/cab/bangalore-airport-to-shahdol-cabs",
          },
          {
            name: "Bangalore airport to Haridwar Cab",
            src: "/cab/bangalore-airport-to-haridwar-cabs",
          },
          {
            name: "Bangalore airport to Kundapura Cab",
            src: "/cab/bangalore-airport-to-kundapura-cabs",
          },
          {
            name: "Bangalore airport to Lateri Cab",
            src: "/cab/bangalore-airport-to-lateri-cabs",
          },
          {
            name: "Bangalore airport to Belthangady Cab",
            src: "/cab/bangalore-airport-to-belthangady-cabs",
          },
          {
            name: "Bangalore airport to Ajanta Cab",
            src: "/cab/bangalore-airport-to-ajanta-cabs",
          },
          {
            name: "Bangalore airport to Sindhudurg Cab",
            src: "/cab/bangalore-airport-to-sindhudurg-cabs",
          },
          {
            name: "Bangalore airport to Khopoli Cab",
            src: "/cab/bangalore-airport-to-khopoli-cabs",
          },
          {
            name: "Bangalore airport to Kamalpur Cab",
            src: "/cab/bangalore-airport-to-kamalpur-cabs",
          },
          {
            name: "Bangalore airport to Bhim Cab",
            src: "/cab/bangalore-airport-to-bhim-cabs",
          },
          {
            name: "Bangalore airport to Banswara Cab",
            src: "/cab/bangalore-airport-to-banswara-cabs",
          },
          {
            name: "Bangalore airport to Ramgarh Cab",
            src: "/cab/bangalore-airport-to-ramgarh-cabs",
          },
          {
            name: "Bangalore airport to Kota Cab",
            src: "/cab/bangalore-airport-to-kota-cabs",
          },
          {
            name: "Bangalore airport to Gariaband Cab",
            src: "/cab/bangalore-airport-to-gariaband-cabs",
          },
          {
            name: "Bangalore airport to Mannargudi Cab",
            src: "/cab/bangalore-airport-to-mannargudi-cabs",
          },
          {
            name: "Bangalore airport to Cumbum Cab",
            src: "/cab/bangalore-airport-to-cumbum-cabs",
          },
          {
            name: "Bangalore airport to Srirangam Cab",
            src: "/cab/bangalore-airport-to-srirangam-cabs",
          },
        ],
      },
    },
    Chennai: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Chennai",
        links: [
          {
            name: "Chennai to Vellore Cab",
            src: "/cab/chennai-to-vellore-cabs",
          },
          {
            name: "Chennai to Bangalore Cab",
            src: "/cab/chennai-to-bangalore-cabs",
          },
          {
            name: "Chennai to Pondicherry Cab",
            src: "/cab/chennai-to-pondicherry-cabs",
          },
          {
            name: "Chennai to Tirupati Cab",
            src: "/cab/chennai-to-tirupati-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Chennai",
        links: [
          {
            name: "Taxi service in Anna Road",
            src: "/cab/anna-road-city-cabs",
          },
          {
            name: "Taxi service in Ambattur",
            src: "/cab/ambattur-city-cabs",
          },
          {
            name: "Taxi service in Tambaram",
            src: "/cab/tambaram-city-cabs",
          },
          {
            name: "Taxi service in Minjur",
            src: "/cab/minjur-city-cabs",
          },
          {
            name: "Taxi service in Ponneri",
            src: "/cab/ponneri-city-cabs",
          },
          {
            name: "Taxi service in Sriperumbudur",
            src: "/cab/sriperumbudur-city-cabs",
          },
          {
            name: "Taxi service in Tiruvallur",
            src: "/cab/tiruvallur-city-cabs",
          },
          {
            name: "Taxi service in Gummidipoondi",
            src: "/cab/gummidipoondi-city-cabs",
          },
          {
            name: "Taxi service in Uttukottai",
            src: "/cab/uttukottai-city-cabs",
          },
          {
            name: "Taxi service in Mahabalipuram",
            src: "/cab/mahabalipuram-city-cabs",
          },
          {
            name: "Taxi service in Chengalpattu",
            src: "/cab/chengalpattu-city-cabs",
          },
          {
            name: "Taxi service in Chinglepet",
            src: "/cab/chinglepet-city-cabs",
          },
          {
            name: "Taxi service in Arambakkam",
            src: "/cab/arambakkam-city-cabs",
          },
          {
            name: "Taxi service in Arakkonam",
            src: "/cab/arakkonam-city-cabs",
          },
          {
            name: "Taxi service in Varadaiahpalem",
            src: "/cab/varadaiahpalem-city-cabs",
          },
          {
            name: "Taxi service in Kanchipuram",
            src: "/cab/kanchipuram-city-cabs",
          },
          {
            name: "Taxi service in Tiruttani",
            src: "/cab/tiruttani-city-cabs",
          },
          {
            name: "Taxi service in Sullurpeta",
            src: "/cab/sullurpeta-city-cabs",
          },
          {
            name: "Taxi service in Madurantakam",
            src: "/cab/madurantakam-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Chennai airport",
        links: [
          {
            name: "Chennai airport to Panaji Cab",
            src: "/cab/chennai-airport-to-panaji-cabs",
          },
          {
            name: "Chennai airport to Ramachandrapuram Cab",
            src: "/cab/chennai-airport-to-ramachandrapuram-cabs",
          },
          {
            name: "Chennai airport to Hilsa Cab",
            src: "/cab/chennai-airport-to-hilsa-cabs",
          },
          {
            name: "Chennai airport to Kausani Cab",
            src: "/cab/chennai-airport-to-kausani-cabs",
          },
          {
            name: "Chennai airport to Yavatmal Cab",
            src: "/cab/chennai-airport-to-yavatmal-cabs",
          },
          {
            name: "Chennai airport to Dhrangadhra Cab",
            src: "/cab/chennai-airport-to-dhrangadhra-cabs",
          },
          {
            name: "Chennai airport to Dhanolti Cab",
            src: "/cab/chennai-airport-to-dhanolti-cabs",
          },
          {
            name: "Chennai airport to Inkollu Cab",
            src: "/cab/chennai-airport-to-inkollu-cabs",
          },
          {
            name: "Chennai airport to Nandghat Cab",
            src: "/cab/chennai-airport-to-nandghat-cabs",
          },
          {
            name: "Chennai airport to Ladwa Cab",
            src: "/cab/chennai-airport-to-ladwa-cabs",
          },
          {
            name: "Chennai airport to Meghalaya Cab",
            src: "/cab/chennai-airport-to-meghalaya-cabs",
          },
          {
            name: "Chennai airport to Salem Cab",
            src: "/cab/chennai-airport-to-salem-cabs",
          },
          {
            name: "Chennai airport to Nurpur Cab",
            src: "/cab/chennai-airport-to-nurpur-cabs",
          },
          {
            name: "Chennai airport to Narwana Cab",
            src: "/cab/chennai-airport-to-narwana-cabs",
          },
          {
            name: "Chennai airport to Nandurbar Cab",
            src: "/cab/chennai-airport-to-nandurbar-cabs",
          },
          {
            name: "Chennai airport to Kalol Cab",
            src: "/cab/chennai-airport-to-kalol-cabs",
          },
          {
            name: "Chennai airport to Ratua Cab",
            src: "/cab/chennai-airport-to-ratua-cabs",
          },
          {
            name: "Chennai airport to Gogamukh Cab",
            src: "/cab/chennai-airport-to-gogamukh-cabs",
          },
          {
            name: "Chennai airport to Lava Lolegaon Cab",
            src: "/cab/chennai-airport-to-lava-lolegaon-cabs",
          },
          {
            name: "Chennai airport to Sakhigopal Cab",
            src: "/cab/chennai-airport-to-sakhigopal-cabs",
          },
          {
            name: "Chennai airport to Narkand Cab",
            src: "/cab/chennai-airport-to-narkand-cabs",
          },
          {
            name: "Chennai airport to Guntakal Cab",
            src: "/cab/chennai-airport-to-guntakal-cabs",
          },
          {
            name: "Chennai airport to Damanjodi Cab",
            src: "/cab/chennai-airport-to-damanjodi-cabs",
          },
          {
            name: "Chennai airport to Mashobra Cab",
            src: "/cab/chennai-airport-to-mashobra-cabs",
          },
          {
            name: "Chennai airport to Khadoor Sahib Cab",
            src: "/cab/chennai-airport-to-khadoor-sahib-cabs",
          },
          {
            name: "Chennai airport to Dhamdha Cab",
            src: "/cab/chennai-airport-to-dhamdha-cabs",
          },
          {
            name: "Chennai airport to Tarana Cab",
            src: "/cab/chennai-airport-to-tarana-cabs",
          },
          {
            name: "Chennai airport to Satara Cab",
            src: "/cab/chennai-airport-to-satara-cabs",
          },
          {
            name: "Chennai airport to Sankarankovil Cab",
            src: "/cab/chennai-airport-to-sankarankovil-cabs",
          },
          {
            name: "Chennai airport to Bharwain Cab",
            src: "/cab/chennai-airport-to-bharwain-cabs",
          },
          {
            name: "Chennai airport to Gaya Cab",
            src: "/cab/chennai-airport-to-gaya-cabs",
          },
          {
            name: "Chennai airport to Rajahmundry Cab",
            src: "/cab/chennai-airport-to-rajahmundry-cabs",
          },
          {
            name: "Chennai airport to Perinthalmanna Cab",
            src: "/cab/chennai-airport-to-perinthalmanna-cabs",
          },
          {
            name: "Chennai airport to Meerut Cab",
            src: "/cab/chennai-airport-to-meerut-cabs",
          },
          {
            name: "Chennai airport to Kolkata Cab",
            src: "/cab/chennai-airport-to-kolkata-cabs",
          },
          {
            name: "Chennai airport to Ujjain Cab",
            src: "/cab/chennai-airport-to-ujjain-cabs",
          },
          {
            name: "Chennai airport to Nagamangala Cab",
            src: "/cab/chennai-airport-to-nagamangala-cabs",
          },
          {
            name: "Chennai airport to Basai Cab",
            src: "/cab/chennai-airport-to-basai-cabs",
          },
          {
            name: "Chennai airport to Lathikata Cab",
            src: "/cab/chennai-airport-to-lathikata-cabs",
          },
          {
            name: "Chennai airport to Siddapur Cab",
            src: "/cab/chennai-airport-to-siddapur-cabs",
          },
          {
            name: "Chennai airport to Nilgiris Cab",
            src: "/cab/chennai-airport-to-nilgiris-cabs",
          },
          {
            name: "Chennai airport to Pauri Cab",
            src: "/cab/chennai-airport-to-pauri-cabs",
          },
          {
            name: "Chennai airport to Idukki Cab",
            src: "/cab/chennai-airport-to-idukki-cabs",
          },
          {
            name: "Chennai airport to Pathanamthitta Cab",
            src: "/cab/chennai-airport-to-pathanamthitta-cabs",
          },
          {
            name: "Chennai airport to Aul Cab",
            src: "/cab/chennai-airport-to-aul-cabs",
          },
          {
            name: "Chennai airport to Barpeta Cab",
            src: "/cab/chennai-airport-to-barpeta-cabs",
          },
          {
            name: "Chennai airport to Laharpur Cab",
            src: "/cab/chennai-airport-to-laharpur-cabs",
          },
          {
            name: "Chennai airport to Birbhum Cab",
            src: "/cab/chennai-airport-to-birbhum-cabs",
          },
          {
            name: "Chennai airport to Anandpur Sahib Cab",
            src: "/cab/chennai-airport-to-anandpur-sahib-cabs",
          },
          {
            name: "Chennai airport to Malda Cab",
            src: "/cab/chennai-airport-to-malda-cabs",
          },
          {
            name: "Chennai airport to Patiyali Cab",
            src: "/cab/chennai-airport-to-patiyali-cabs",
          },
          {
            name: "Chennai airport to Yemmiganur Cab",
            src: "/cab/chennai-airport-to-yemmiganur-cabs",
          },
          {
            name: "Chennai airport to Mandar Cab",
            src: "/cab/chennai-airport-to-mandar-cabs",
          },
          {
            name: "Chennai airport to Fatehgarh Sahib Cab",
            src: "/cab/chennai-airport-to-fatehgarh-sahib-cabs",
          },
          {
            name: "Chennai airport to Bellary Cab",
            src: "/cab/chennai-airport-to-bellary-cabs",
          },
          {
            name: "Chennai airport to Bicholim Cab",
            src: "/cab/chennai-airport-to-bicholim-cabs",
          },
          {
            name: "Chennai airport to Chandragiri Cab",
            src: "/cab/chennai-airport-to-chandragiri-cabs",
          },
          {
            name: "Chennai airport to Chandauli Cab",
            src: "/cab/chennai-airport-to-chandauli-cabs",
          },
          {
            name: "Chennai airport to Nalgonda Cab",
            src: "/cab/chennai-airport-to-nalgonda-cabs",
          },
        ],
      },
    },
    Dehradun: {
      Outstation: {
        id: 1,
        title: "Cabs Services From Dehradun",
        links: [
          {
            name: "Dehradun to Mussoorie Cab",
            src: "/cab/dehradun-to-mussoorie-cabs",
          },
          {
            name: "Dehradun to Delhi Cab",
            src: "/cab/dehradun-to-delhi-cabs",
          },
          {
            name: "Dehradun to Gurgaon Cab",
            src: "/cab/dehradun-to-gurgaon-cabs",
          },
          {
            name: "Dehradun to Noida Cab",
            src: "/cab/dehradun-to-noida-cabs",
          },
          {
            name: "Dehradun to Faridabad Cab",
            src: "/cab/dehradun-to-faridabad-cabs",
          },
        ],
      },
      Other: {
        id: 2,
        title: "Other Taxi Services near Dehradun",
        links: [
          {
            name: "Taxi service in Mussoorie",
            src: "/cab/mussoorie-city-cabs",
          },
          {
            name: "Taxi service in Dhanaulti",
            src: "/cab/dhanaulti-city-cabs",
          },
          {
            name: "Taxi service in Dhanolti",
            src: "/cab/dhanolti-city-cabs",
          },
          {
            name: "Taxi service in Kalsi",
            src: "/cab/kalsi-city-cabs",
          },
          {
            name: "Taxi service in Narendra Nagar",
            src: "/cab/narendra-nagar-city-cabs",
          },
          {
            name: "Taxi service in Vikasnagar",
            src: "/cab/vikasnagar-city-cabs",
          },
          {
            name: "Taxi service in Kanatal",
            src: "/cab/kanatal-city-cabs",
          },
          {
            name: "Taxi service in Rishikesh",
            src: "/cab/rishikesh-city-cabs",
          },
          {
            name: "Taxi service in New Tehri",
            src: "/cab/new-tehri-city-cabs",
          },
          {
            name: "Taxi service in Tehri",
            src: "/cab/tehri-city-cabs",
          },
          {
            name: "Taxi service in Neelkanth",
            src: "/cab/neelkanth-city-cabs",
          },
          {
            name: "Taxi service in Haridwar",
            src: "/cab/haridwar-city-cabs",
          },
          {
            name: "Taxi service in Paonta Sahib",
            src: "/cab/paonta-sahib-city-cabs",
          },
          {
            name: "Taxi service in Jwalapur",
            src: "/cab/jwalapur-city-cabs",
          },
          {
            name: "Taxi service in Chakrata",
            src: "/cab/chakrata-city-cabs",
          },
          {
            name: "Taxi service in Bhagwanpur",
            src: "/cab/bhagwanpur-city-cabs",
          },
          {
            name: "Taxi service in Roorkee",
            src: "/cab/roorkee-city-cabs",
          },
          {
            name: "Taxi service in Naugaon",
            src: "/cab/naugaon-city-cabs",
          },
          {
            name: "Taxi service in Uttarkashi",
            src: "/cab/uttarkashi-city-cabs",
          },
          {
            name: "Taxi service in Saharanpur",
            src: "/cab/saharanpur-city-cabs",
          },
        ],
      },
      Airport: {
        id: 3,
        title: "Cabs from Dehradun airport",
        links: [
          {
            name: "Dehradun airport to Bhuj Cab",
            src: "/cab/dehradun-airport-to-bhuj-cabs",
          },
          {
            name: "Dehradun airport to Akabarpur Cab",
            src: "/cab/dehradun-airport-to-akabarpur-cabs",
          },
          {
            name: "Dehradun airport to Phagwara Cab",
            src: "/cab/dehradun-airport-to-phagwara-cabs",
          },
          {
            name: "Dehradun airport to Rajam Cab",
            src: "/cab/dehradun-airport-to-rajam-cabs",
          },
          {
            name: "Dehradun airport to Kulithalai Cab",
            src: "/cab/dehradun-airport-to-kulithalai-cabs",
          },
          {
            name: "Dehradun airport to Lataguri Cab",
            src: "/cab/dehradun-airport-to-lataguri-cabs",
          },
          {
            name: "Dehradun airport to Kalka Cab",
            src: "/cab/dehradun-airport-to-kalka-cabs",
          },
          {
            name: "Dehradun airport to Bhogaon Cab",
            src: "/cab/dehradun-airport-to-bhogaon-cabs",
          },
          {
            name: "Dehradun airport to Laharpur Cab",
            src: "/cab/dehradun-airport-to-laharpur-cabs",
          },
          {
            name: "Dehradun airport to Bobbili Cab",
            src: "/cab/dehradun-airport-to-bobbili-cabs",
          },
          {
            name: "Dehradun airport to Unnao Cab",
            src: "/cab/dehradun-airport-to-unnao-cabs",
          },
          {
            name: "Dehradun airport to Tindivanam Cab",
            src: "/cab/dehradun-airport-to-tindivanam-cabs",
          },
          {
            name: "Dehradun airport to Talcher Cab",
            src: "/cab/dehradun-airport-to-talcher-cabs",
          },
          {
            name: "Dehradun airport to Shahabad Cab",
            src: "/cab/dehradun-airport-to-shahabad-cabs",
          },
          {
            name: "Dehradun airport to Hapur Cab",
            src: "/cab/dehradun-airport-to-hapur-cabs",
          },
          {
            name: "Dehradun airport to Orachha Cab",
            src: "/cab/dehradun-airport-to-orachha-cabs",
          },
          {
            name: "Dehradun airport to Karaikudi Cab",
            src: "/cab/dehradun-airport-to-karaikudi-cabs",
          },
          {
            name: "Dehradun airport to Gandevi Cab",
            src: "/cab/dehradun-airport-to-gandevi-cabs",
          },
          {
            name: "Dehradun airport to Holenarasipur Cab",
            src: "/cab/dehradun-airport-to-holenarasipur-cabs",
          },
          {
            name: "Dehradun airport to Dhar Cab",
            src: "/cab/dehradun-airport-to-dhar-cabs",
          },
        ],
      },
    },
  };

  const [sourceData, setSourceData] = useState(null);
  const [destinationData, setDestinationData] = useState(null);

  function findWord(text, word) {
    const words = text.split(",");
    return words.includes(word);
  }

  useEffect(() => {
    for (let key in PagesDetail) {
      if (findWord(source, key)) {
        setSourceData(PagesDetail[key]);
      }
      if (findWord(destination, key)) {
        setDestinationData(PagesDetail[key]);
      }
    }
  }, [source, destination]);

  return (
    <div style={{ backgroundColor: "#fafafa" }}>
      <Layout title="light_header" />
      <ListSearch
        data={data}
        setisValid={setisValid}
        rentals={rentals}
        setRentals={setRentals}
      />
      <ListingView data={data} isValid={isValid} price={blogdata?.price} />
      {/* <CabPopup/> */}
      {/* <CabOptions/> */}
      {blogdata ? <DelhiToDestination data={blogdata} /> : null}
      {/* <CabOptions1 source={source}/> */}
      {/* <RentalSection destination={destination}/> */}
      {(sourceData || destinationData) && (
        <ServiceBlocks
          sourceData={sourceData}
          destinationData={destinationData}
        />
      )}
      <DelhiToDesinationMeta1 query={source} query1={destination} />
      <FooterComponent />
    </div>
  );
}
export default CabListing1;
