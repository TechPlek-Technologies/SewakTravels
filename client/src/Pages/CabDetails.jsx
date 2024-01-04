import { useParams } from "react-router-dom";
import FooterComponent from "../Components/Common/FooterComponent";
import { carData } from "../Data/CabData";
import Layout from "../Layout/Layout";
import Booking from "./Booking";

function CabDetails() {
 

 
  const param = useParams();
  const desiredCar = carData.find(car => car.id === parseInt(param.id));

  return (
    <>
      <Layout title="light_header" />
      {/* <ListingBanner title={"cab Detail"} /> */}
      <Booking desiredcar={desiredCar} /> 

      <FooterComponent />
    </>
  );
}
export default CabDetails;
