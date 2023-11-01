import { useEffect } from "react";
import SingleDetailPage from "../Components/CabDetails/SingleDetailPage";
import FooterComponent from "../Components/Common/FooterComponent";
import { carData } from "../Data/CabData";
import Layout from "../Layout/Layout";
// import { useParams } from "react-router-dom";

function CabDetails() {
  useEffect(() => {
    document.documentElement.style.setProperty(
      "--theme-color1",
      "233, 179, 14"
    );
    document.documentElement.style.setProperty("--theme-color2", "239, 63, 62");

    return () => {
      document.documentElement.style.setProperty(
        "--theme-color1",
        "239, 63, 62"
      );
      document.documentElement.style.setProperty(
        "--theme-color2",
        "0, 162, 247"
      );
    };
  }, []);

 
  // const param = useParams();

  // const targetId = param.id;
  const desiredcar = carData.find(car => car.id === 1);

  console.log(desiredcar?.id);

  return (
    <>
      <Layout title="light_header" />
      {/* <ListingBanner title={"cab Detail"} /> */}
      <SingleDetailPage desiredcar={desiredcar} /> 

      <FooterComponent />
    </>
  );
}
export default CabDetails;
