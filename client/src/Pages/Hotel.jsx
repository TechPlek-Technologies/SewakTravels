import NewHomeBanner from "../Components/Cab/Home/NewHomeBanner";
import FooterComponent from "../Components/Common/FooterComponent";
import Layout from "../Layout/Layout";

const Hotel=()=>{
    return (
        <>
          <Layout title="overlay-black" />
          <NewHomeBanner />
         
          <FooterComponent />
        </>
      );
}
export default Hotel;