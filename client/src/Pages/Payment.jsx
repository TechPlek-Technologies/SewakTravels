import { useParams } from "react-router-dom";
import FooterComponent from "../Components/Common/FooterComponent";
import SuccessPage from "../Components/Payment/SuccessPage";
import Layout from "../Layout/Layout";
import FailurePage from "../Components/Payment/FailurePage";

const Payment = () => {
    const params=useParams();
    const transactionID=params.transactionId;

  return (
    <>
      <Layout title="light_header" userBgClass="user user-light" />
      {transactionID? <SuccessPage
        img="/assets/images/hotel/booking-success.png"
        title="Payment Successful ! get ready for your comfortable travel."
        transacionID={transactionID}
      />:<FailurePage img="/assets/images/hotel/booking-failed.png" />}
      <FooterComponent />
    </>
  );
};

export default Payment;
