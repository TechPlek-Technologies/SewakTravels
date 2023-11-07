import { useEffect, useState } from "react";
import ListingView from "../Components/Cab/Listing/ListingView"
import Layout from "../Layout/Layout"
import ListSearch from "../Components/Cab/Listing/ListSearch";
import FooterComponent from "../Components/Common/FooterComponent";

import axios from 'axios';

function CabListing(){

const [validate,setValidate]=useState(false)
const [carData,setCarData]=useState([]);
useEffect(() => {
  // Define the API endpoint
  const apiUrl = 'http://localhost:5000/api';

  // Make the API call
  axios.get(apiUrl)
    .then(response => {
      // Handle the API response data here
      console.log('API Response:', response.data);
      setCarData(response.data)
    })
    .catch(error => {
      // Handle API call errors here
      console.error('API Error:', error);
    });
}, []);
    return(
        <>
        <Layout title="light_header"/>
        <ListSearch setValidate={setValidate}/>
        <ListingView data={carData} validate={validate}/>
        <FooterComponent/>
      </>
    )
}
 export default CabListing