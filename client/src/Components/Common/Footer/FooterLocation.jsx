import React from "react";
import { Link } from "react-router-dom";

const FooterLocation = () => {
  const data = {
    Delhi: {
      id: 1,
      title: "Cabs From Delhi",
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
    OtherTaxi: {
      id: 10,
      title: "Other Taxi Services",
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
        { name: "Taxi service in Barau", src: "/cab/barau-city-cabs" },
        { name: "Taxi service in Baraut", src: "/cab/baraut-city-cabs" },
        {
          name: "Taxi service in Gautam Buddha Nagar",
          src: "/cab/gautam-buddha-nagar-city-cabs",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "/cab/shamshabad-city-cabs",
        },
        { name: "Taxi service in Kagarol", src: "/cab/kagarol-city-cabs" },
        { name: "Taxi service in Sadabad", src: "/cab/sadabad-city-cabs" },
        { name: "Taxi service in Bisawar", src: "/cab/bisawar-city-cabs" },
        { name: "Taxi service in Tundla", src: "/cab/tundla-city-cabs" },
        { name: "Taxi service in Rajakhera", src: "/cab/rajakhera-city-cabs" },
        {
          name: "Taxi service in Fatehpur Sikri",
          src: "/cab/fatehpur-sikri-city-cabs",
        },
        { name: "Taxi service in Firozabad", src: "/cab/firozabad-city-cabs" },
        { name: "Taxi service in Jalesar", src: "/cab/jalesar-city-cabs" },
        { name: "Taxi service in Hathras", src: "/cab/hathras-city-cabs" },
        { name: "Taxi service in Mathura", src: "/cab/mathura-city-cabs" },
        { name: "Taxi service in Bharatpur", src: "/cab/bharatpur-city-cabs" },
        { name: "Taxi service in Dholpur", src: "/cab/dholpur-city-cabs" },
        { name: "Taxi service in Vrindavan", src: "/cab/vrindavan-city-cabs" },
        { name: "Taxi service in Ambah", src: "/cab/ambah-city-cabs" },
        {
          name: "Taxi service in Shikohabad",
          src: "/cab/shikohabad-city-cabs",
        },
        { name: "Taxi service in Holipura", src: "/cab/holipura-city-cabs" },
        { name: "Taxi service in Sasni", src: "/cab/sasni-city-cabs" },
        { name: "Taxi service in Iglas", src: "/cab/iglas-city-cabs" },
        { name: "Taxi service in Govardhan", src: "/cab/govardhan-city-cabs" },
        {
          name: "Taxi service in Shekhawati",
          src: "/cab/shekhawati-city-cabs",
        },
        { name: "Taxi service in Kukas", src: "/cab/kukas-city-cabs" },
        {
          name: "Taxi service in Bhambhoria",
          src: "/cab/bhambhoria-city-cabs",
        },
        { name: "Taxi service in Begas", src: "/cab/begas-city-cabs" },
        { name: "Taxi service in Bassi", src: "/cab/bassi-city-cabs" },
        { name: "Taxi service in Achrol", src: "/cab/achrol-city-cabs" },
        { name: "Taxi service in Chomu", src: "/cab/chomu-city-cabs" },
        {
          name: "Taxi service in Asalpur Jobner",
          src: "/cab/asalpur-jobner-city-cabs",
        },
        { name: "Taxi service in Chaksu", src: "/cab/chaksu-city-cabs" },
        { name: "Taxi service in Pawta", src: "/cab/pawta-city-cabs" },
        { name: "Taxi service in Jobner", src: "/cab/jobner-city-cabs" },
        {
          name: "Taxi service in Alila Fort Bishangarh",
          src: "/cab/alila-fort-bishangarh-city-cabs",
        },
        {
          name: "Taxi service in Mojamabaad",
          src: "/cab/mojamabaad-city-cabs",
        },
        { name: "Taxi service in Renwal", src: "/cab/renwal-city-cabs" },
        {
          name: "Taxi service in Mehandipur Balaji",
          src: "/cab/mehandipur-balaji-city-cabs",
        },
        { name: "Taxi service in Dausa", src: "/cab/dausa-city-cabs" },
        {
          name: "Taxi service in Virat Nagar",
          src: "/cab/virat-nagar-city-cabs",
        },
        { name: "Taxi service in Shahpura", src: "/cab/shahpura-city-cabs" },
        { name: "Taxi service in Ringas", src: "/cab/ringas-city-cabs" },
        {
          name: "Taxi service in Khatu Shyam",
          src: "/cab/khatu-shyam-city-cabs",
        },
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
          name: "Taxi service in Thane",
          src: "/cab/thane-city-cabs",
        },
        {
          name: "Taxi service in Shirur",
          src: "/cab/shirur-city-cabs",
        },
        {
          name: "Taxi service in Panvel",
          src: "/cab/panvel-city-cabs",
        },
        {
          name: "Taxi service in Panchgani",
          src: "/cab/panchgani-city-cabs",
        },
        {
          name: "Taxi service in New Panvel",
          src: "/cab/new-panvel-city-cabs",
        },
        {
          name: "Taxi service in Navi Mumbai",
          src: "/cab/navi-mumbai-city-cabs",
        },
        {
          name: "Taxi service in Mira Bhayandar",
          src: "/cab/mira-bhayandar-city-cabs",
        },
        {
          name: "Taxi service in Imagica",
          src: "/cab/imagica-city-cabs",
        },
        {
          name: "Taxi service in Dombivli",
          src: "/cab/dombivli-city-cabs",
        },
        {
          name: "Taxi service in Andheri",
          src: "/cab/andheri-city-cabs",
        },
        {
          name: "Taxi service in Shirwal",
          src: "/cab/shirwal-city-cabs",
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
        {
          name: "Taxi service in Pawna Lake",
          src: "/cab/pawna-lake-city-cabs",
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
          name: "Taxi service in Vasai ",
          src: "/cab/vasai-city-cabs",
        },
        {
          name: "Taxi service in Ltt ",
          src: "/cab/ltt-city-cabs",
        },
        { name: "Taxi service in Rupnagar", src: "/cab/rupnagar-city-cabs" },
        { name: "Taxi service in Hoskote", src: "/cab/hoskote-city-cabs" },
        {
          name: "Taxi service in Nelamangala",
          src: "/cab/nelamangala-city-cabs",
        },
        {
          name: "Taxi service in Bangalore Rural",
          src: "/cab/bangalore-rural-city-cabs",
        },
        { name: "Taxi service in Hosur", src: "/cab/hosur-city-cabs" },
        {
          name: "Taxi service in Doddaballapur",
          src: "/cab/doddaballapur-city-cabs",
        },
        { name: "Taxi service in Malur", src: "/cab/malur-city-cabs" },
        { name: "Taxi service in Magadi", src: "/cab/magadi-city-cabs" },
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
        { name: "Taxi service in Kodagu", src: "/cab/kodagu-city-cabs" },
        { name: "Taxi service in Kolar", src: "/cab/kolar-city-cabs" },
        { name: "Taxi service in Anna Road", src: "/cab/anna-road-city-cabs" },
        { name: "Taxi service in Ambattur", src: "/cab/ambattur-city-cabs" },
        { name: "Taxi service in Tambaram", src: "/cab/tambaram-city-cabs" },
        { name: "Taxi service in Minjur", src: "/cab/minjur-city-cabs" },
        { name: "Taxi service in Ponneri", src: "/cab/ponneri-city-cabs" },
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
          name: "Taxi service in Uthukottai",
          src: "/cab/uthukottai-city-cabs",
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
        { name: "Taxi service in Arakkonam", src: "/cab/arakkonam-city-cabs" },
        {
          name: "Taxi service in Varadaiahpalem",
          src: "/cab/varadaiahpalem-city-cabs",
        },
        {
          name: "Taxi service in Kanchipuram",
          src: "/cab/kanchipuram-city-cabs",
        },
        { name: "Taxi service in Tiruttani", src: "/cab/tiruttani-city-cabs" },
        {
          name: "Taxi service in Sullurpeta",
          src: "/cab/sullurpeta-city-cabs",
        },
        {
          name: "Taxi service in Madurantakam",
          src: "/cab/madurantakam-city-cabs",
        },
        { name: "Taxi service in Dehradun", src: "" },
        { name: "Taxi service in Mussoorie", src: "/cab/mussoorie-city-cabs" },
        { name: "Taxi service in Dhanaulti", src: "/cab/dhanaulti-city-cabs" },
        { name: "Taxi service in Dhanolti", src: "/cab/dhanolti-city-cabs" },
        { name: "Taxi service in Kalsi", src: "/cab/kalsi-city-cabs" },
        {
          name: "Taxi service in Narendra Nagar",
          src: "/cab/narendra-nagar-city-cabs",
        },
        {
          name: "Taxi service in Vikasnagar",
          src: "/cab/vikasnagar-city-cabs",
        },
        { name: "Taxi service in Kanatal", src: "/cab/kanatal-city-cabs" },
        { name: "Taxi service in Rishikesh", src: "/cab/rishikesh-city-cabs" },
        { name: "Taxi service in New Tehri", src: "/cab/new-tehri-city-cabs" },
        { name: "Taxi service in Tehri", src: "/cab/tehri-city-cabs" },
        { name: "Taxi service in Neelkanth", src: "/cab/neelkanth-city-cabs" },
        { name: "Taxi service in Haridwar", src: "/cab/haridwar-city-cabs" },
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
    OtherCities: {
      id: 2,
      title: "Cabs From Other Cities",
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
          src: "/cab/pune-to-nasik-cabs",
        },
        {
          name: "Pune to Aurangabad Cab",
          src: "/cab/pune-to-aurangabad-cabs",
        },
        {
          name: "Mumbai to Pune Cab",
          src: "/cab/mumbai-to-pune-cabs",
        },
        {
          name: "Mumbai to Nashik Cab",
          src: "/cab/mumbai-to-nasik-cabs",
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
    AirportTaxis: {
      id: 3,
      title: "Our Airport Cabs",
      links: [
        {
          name: "Agra Airport Cabs",
          src: "/cab/agra-airport-taxi",
        },
        {
          name: "Ahmedabad Airport Cabs",
          src: "/cab/ahmedabad-airport-taxi",
        },
        {
          name: "Ajmer Airport Cabs",
          src: "/cab/ajmer-airport-taxi",
        },
        {
          name: "Akola Airport Cabs",
          src: "/cab/akola-airport-taxi",
        },
        {
          name: "Allahabad Airport Cabs",
          src: "/cab/allahabad-airport-taxi",
        },
        {
          name: "Amritsar Airport Cabs",
          src: "/cab/amritsar-airport-taxi",
        },
        {
          name: "Aurangabad Airport Cabs",
          src: "/cab/aurangabad-airport-taxi",
        },
        {
          name: "Ayodhya Airport Cabs",
          src: "/cab/ayodhya-airport-taxi",
        },
        {
          name: "Bagdogra Airport Cabs",
          src: "/cab/bagdogra-airport-taxi",
        },
        {
          name: "Bareilly Airport Cabs",
          src: "/cab/bareilly-airport-taxi",
        },
        {
          name: "Belgaum Airport Cabs",
          src: "/cab/belgaum-airport-taxi",
        },
        {
          name: "Satna Airport Cabs",
          src: "/cab/satna-airport-taxi",
        },
        {
          name: "Bhubaneswar Airport Cabs",
          src: "/cab/bhubaneswar-airport-taxi",
        },
        {
          name: "Chandigarh Airport Cabs",
          src: "/cab/chandigarh-airport-taxi",
        },
        {
          name: "Chennai Airport Cabs",
          src: "/cab/chennai-airport-taxi",
        },
        {
          name: "Chhatrapati Shivaji Airport Cabs",
          src: "/cab/mumbai-airport-taxi",
        },
        {
          name: "Cochin Airport Cabs",
          src: "/cab/cochin-airport-taxi",
        },
        {
          name: "Coimbatore Airport Cabs",
          src: "/cab/coimbatore-airport-taxi",
        },
        {
          name: "Daman Airport Cabs",
          src: "/cab/daman-airport-taxi",
        },
        {
          name: "Darbhanga Airport Cabs",
          src: "/cab/darbhanga-airport-taxi",
        },
        {
          name: "Dehradun Airport Cabs",
          src: "/cab/dehradun-airport-taxi",
        },
        {
          name: "Dimapur Airport Cabs",
          src: "/cab/dimapur-airport-taxi",
        },
        {
          name: "Diu Airport Cabs",
          src: "/cab/diu-airport-taxi",
        },
        {
          name: "Gorakhpur Airport Cabs",
          src: "/cab/gorakhpur-airport-taxi",
        },
        {
          name: "Guwahati Airport Cabs",
          src: "/cab/guwahati-airport-taxi",
        },
        {
          name: "Hindon Airport Cabs",
          src: "/cab/hindon-airport-taxi",
        },
        {
          name: "Hubballi Airport Cabs",
          src: "/cab/hubballi-airport-taxi",
        },
        {
          name: "Hyderabad Airport Cabs",
          src: "/cab/hyderabad-airport-taxi",
        },
        {
          name: "Indira Gandhi International Airport Cabs",
          src: "/cab/delhi-airport-taxi",
        },
        {
          name: "Indore Airport Cabs",
          src: "/cab/indore-airport-taxi",
        },
        {
          name: "Jabalpur Airport Cabs",
          src: "/cab/jabalpur-airport-taxi",
        },
        {
          name: "Jaipur Airport Cabs",
          src: "/cab/jabalpur-airport-taxi",
        },
        {
          name: "Jodhpur Airport Cabs",
          src: "/cab/jodhpur-airport-taxi",
        },
        {
          name: "Kangra Airport Cabs",
          src: "/cab/kangra-airport-taxi",
        },
        {
          name: "Kannur Airport Cabs",
          src: "/cab/kannur-airport-taxi",
        },
        {
          name: "Kanpur Airport Cabs",
          src: "/cab/kanpur-airport-taxi",
        },
        {
          name: "Kazi Nazrul Islam Airport Cabs",
          src: "/cab/kazi-nazrul-islam-airport-taxi",
        },
        {
          name: "Kempegowda Airport Cabs",
          src: "/cab/bangalore-airport-taxi",
        },
        {
          name: "Kolkata Airport Cabs",
          src: "/cab/kolkata-airport-taxi",
        },
        {
          name: "Kozhikode Airport Cabs",
          src: "/cab/kozhikode-airport-taxi",
        },
        {
          name: "Lucknow Airport Cabs",
          src: "/cab/lucknow-airport-taxi",
        },
        {
          name: "Ludhiana Airport Cabs",
          src: "/cab/ludhiana-airport-taxi",
        },
      ],
    },
    // Jaipur: {
    //   id: 3,
    //   title: "Cabs From Jaipur",
    //   links: [
    //     {
    //       name: "Jaipur to Delhi Cab",
    //       src: "/cab/jaipur-to-delhi-cabs",
    //     },
    //     {
    //       name: "Jaipur To Gurgaon Cab",
    //       src: "/cab/jaipur-to-gurgaon-cabs",
    //     },
    //     {
    //       name: "Jaipur To Noida Cab",
    //       src: "/cab/jaipur-to-noida-cabs",
    //     },
    //     {
    //       name: "Jaipur to Faridabad Cab",
    //       src: "/cab/jaipur-to-faridabad-cabs",
    //     },
    //     {
    //       name: "Jaipur To Ghaziabad Cab",
    //       src: "/cab/jaipur-to-ghaziabad-cabs",
    //     },
    //   ],
    // },
    // Pune: {
    //   id: 4,
    //   title: "Cabs From Pune",
    //   links: [
    //     {
    //       name: "Pune to Mumbai Cab",
    //       src: "/cab/pune-to-mumbai-cabs",
    //     },
    //     {
    //       name: "Pune to Shirdi Cab",
    //       src: "/cab/pune-to-shirdi-cabs",
    //     },
    //     {
    //       name: "Pune to Mahabaleshwar Cab",
    //       src: "/cab/pune-to-mahabaleshwar-cabs",
    //     },
    //     {
    //       name: "Pune to Nashik Cab",
    //       src: "/cab/pune-to-nasik-cabs",
    //     },
    //     {
    //       name: "Pune to Aurangabad Cab",
    //       src: "/cab/pune-to-aurangabad-cabs",
    //     },
    //   ],
    // },
    // Mumbai: {
    //   id: 5,
    //   title: "Cabs From Mumbai",
    //   links: [
    //     {
    //       name: "Mumbai to Pune Cab",
    //       src: "/cab/mumbai-to-pune-cabs",
    //     },
    //     {
    //       name: "Mumbai to Nashik Cab",
    //       src: "/cab/mumbai-to-nasik-cabs",
    //     },
    //     {
    //       name: "Mumbai to Shirdi Cab",
    //       src: "/cab/mumbai-to-shirdi-cabs",
    //     },
    //     {
    //       name: "Mumbai to Lonavala Cab",
    //       src: "/cab/mumbai-to-lonavala-cabs",
    //     },
    //     {
    //       name: "Mumbai to Mahabaleshwar Cab",
    //       src: "/cab/mumbai-to-mahabaleshwar-cabs",
    //     },
    //   ],
    // },
    // Chandigarh: {
    //   id: 6,
    //   title: "Cabs From Chandigarh",
    //   links: [
    //     {
    //       name: "Chandigarh to Delhi Cab",
    //       src: "/cab/chandigarh-to-delhi-cabs",
    //     },
    //     {
    //       name: "Chandigarh to Shimla Cab",
    //       src: "/cab/chandigarh-to-shimla-cabs",
    //     },
    //     {
    //       name: "Chandigarh to Manali Cab",
    //       src: "/cab/chandigarh-to-manali-cabs",
    //     },
    //     {
    //       name: "Chandigarh to Gurgaon Cab",
    //       src: "/cab/chandigarh-to-gurgaon-cabs",
    //     },
    //     {
    //       name: "Chandigarh to Noida Cab",
    //       src: "/cab/chandigarh-to-noida-cabs",
    //     },
    //   ],
    // },
    // Bangalore: {
    //   id: 7,
    //   title: "Cabs From Bangalore",
    //   links: [
    //     {
    //       name: "Bangalore to Ooty Cab",
    //       src: "/cab/bangalore-to-ooty-cabs",
    //     },
    //     {
    //       name: "Bangalore to Madikeri Cab",
    //       src: "/cab/bangalore-to-madikeri-cabs",
    //     },
    //     {
    //       name: "Bangalore to Coorg Cab",
    //       src: "/cab/bangalore-to-coorg-cabs",
    //     },
    //     {
    //       name: "Bangalore to Vellore Cab",
    //       src: "/cab/bangalore-to-vellore-cabs",
    //     },
    //   ],
    // },
    // Chennai: {
    //   id: 8,
    //   title: "Cabs From Chennai",
    //   links: [
    //     {
    //       name: "Chennai to Vellore Cab",
    //       src: "/cab/chennai-to-vellore-cabs",
    //     },
    //     {
    //       name: "Chennai to Bangalore Cab",
    //       src: "/cab/chennai-to-bangalore-cabs",
    //     },
    //     {
    //       name: "Chennai to Pondicherry Cab",
    //       src: "/cab/chennai-to-pondicherry-cabs",
    //     },
    //     {
    //       name: "Chennai to Tirupati Cab",
    //       src: "/cab/chennai-to-tirupati-cabs",
    //     },
    //   ],
    // },
    // Dehradun: {
    //   id: 9,
    //   title: "Cabs From Dehradun",
    //   links: [
    //     {
    //       name: "Dehradun to Mussoorie Cab",
    //       src: "/cab/dehradun-to-mussoorie-cabs",
    //     },
    //     {
    //       name: "Dehradun to Delhi Cab",
    //       src: "/cab/dehradun-to-delhi-cabs",
    //     },
    //     {
    //       name: "Dehradun to Gurgaon Cab",
    //       src: "/cab/dehradun-to-gurgaon-cabs",
    //     },
    //     {
    //       name: "Dehradun to Noida Cab",
    //       src: "/cab/dehradun-to-noida-cabs",
    //     },
    //     {
    //       name: "Dehradun to Faridabad Cab",
    //       src: "/cab/dehradun-to-faridabad-cabs",
    //     },
    //   ],
    // },
  };

  return (
    <div className="footer">
      <div className="container">
        <div className="row">
          <div className="col-xl-12 col-md-12 col-sm-12 FooterBorder">
            <div className="FooterLoc">
              {Object.values(data).map((location) => (
                <p key={location.id}>
                  <span className="font">{location.title}</span>
                  {location.links.map((link, index) => (
                    <>
                      <Link key={index} to={link.src}>
                        {link.name}
                      </Link>
                      {index < location.links.length - 1 && "| "}
                    </>
                  ))}
                </p>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default FooterLocation;
