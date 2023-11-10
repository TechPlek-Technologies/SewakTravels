import { useEffect } from "react";
// import SingleDetailPage from "../Components/CabDetails/SingleDetailPage";
import FooterComponent from "../Components/Common/FooterComponent";
import { carData } from "../Data/CabData";
import Layout from "../Layout/Layout";
import Booking from "./Booking";
// import { useParams } from "react-router-dom";

function CabDetails() {
 

 
  // const param = useParams();

  // const targetId = param.id;
  const desiredcar = carData.find(car => car.id === 1);

  console.log(desiredcar?.id);

  return (
    <>
      <Layout title="light_header" />
      {/* <ListingBanner title={"cab Detail"} /> */}
      <Booking desiredcar={desiredcar} /> 

      <FooterComponent />
    </>
  );
}
export default CabDetails;
