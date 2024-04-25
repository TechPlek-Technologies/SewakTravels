import { useContext, useEffect, useRef, useState } from "react";
import Summary from "../Components/Booking/Summary";
import TravelInfo from "../Components/Booking/TravelInfo";
import Animation from "../Components/Common/Animation";
import { AppContext } from "../Context/JourneyContext";
import { getAuthToken, sendSMS } from "../Utility/SendSMS";
import { PaymentContext } from "../Context/PaymentContext";
import { useParams } from "react-router-dom";
import { addBillingData } from "../Utility/ca_admin";
import { SendMail } from "../Utility/SendMail";
import { HtmlEmailTemplate } from "../Utility/EmailTemplate";

const Booking = ({desiredcar}) => {
  const { journeyData } = useContext(AppContext);
  const {paymentData,setPaymentData}=useContext(PaymentContext);

  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);

    // Redirect to home page if source or destination is empty
    if (!paymentData.totalFare) {
      window.location.href = "/";; // Replace "/" with the actual path of your home page
    }
  }, [ journeyData.source, journeyData.destination]);

 
  // const targetId = param.id;


  const totalFare=paymentData.totalFare;
 

  const [payableAmount,setpayableAmount]= useState(Math.ceil((totalFare * 15) / 100))

  const [night,setNight]=useState(0);
  const [driverAllowance,setDriverAllowance]=useState(0);

  const firstNameRef = useRef(null);
  const lastNameRef = useRef(null);
  const emailRef = useRef(null);
  const contactRef = useRef(null);
  const requestRef = useRef(null);

  const [isValid, setIsValid] = useState(false);

  const params=useParams();

  async function displayRazorpay() {
    const options = {
      key: "rzp_live_EeRnadU1BUMdxW",
      amount: payableAmount*100, // 2000 paise = INR 20, amount in paisa
      name: "Sewak Travels",
      description: "Purchase Description",
      image: "/assets/img/logo.png",
      handler: function (response) {
        sendSmsWithDynamicSchedule()

        const paymentsData = {
          transaction_id:response.razorpay_payment_id,
          billing_name:firstNameRef.current.value+" "+lastNameRef.current.value,
          billing_email:emailRef.current.value,
          billing_mobile:contactRef.current.value,
          mode_of_payment:"RazaorPay",
          cab_type:journeyData.selectedValue,
          min_amount:payableAmount,
          trip_type:journeyData.selectedValue,
          pickup_location:journeyData.source,
          drop_location:journeyData.destination,
          pickup_date:journeyData.startDate,
          pickup_time:journeyData.startTime,
          return_date:journeyData.returnDate,
          return_time:journeyData.returnTime,
          distance:journeyData.travelDistance,
          duration:journeyData.travelTime,
          driver_allowance: paymentData.driverAllowance,
          night_charges:paymentData.nightCharges,
          car_type:params.id==="1"?"Sedan":params.id==="2"?"SUV":"prime SUV",
          discount:paymentData?.discount||null,
          sub_total:totalFare,
          order_comments:requestRef.current.value||"",
          total:totalFare,
          min_paid_amount:payableAmount,
          paid_amount:payableAmount,
          invoice_no:response.razorpay_payment_id,
          pick_type:journeyData.selectedValue,
          status:"success",
          base_price:totalFare,
          car_price:params.id==="1"?22:params.id==="2"?23.5:28,
        };
      
        addBillingData(paymentsData);
        sendMail(paymentsData)

        window.location.href = `/payment/${response.razorpay_payment_id}`
      },
      prefill: {
        name: firstNameRef.current.value, 
        email: emailRef.current.value,
      },
      notes: {
        address: "Hello World",
      },
      theme: {
        color: "#ef3f3e",
      },
    };

    const paymentObject = new window.Razorpay(options);
    paymentObject.open();
  }


  async function sendSmsWithDynamicSchedule() {   
    try {
      const authToken = await getAuthToken();
  
      // Use the authToken to send SMS
      const response = await sendSMS(
        authToken,
        '9993557535',
        'Your SMS text here',
        'YourSenderID',
        'YourDLRUrl',
        '2/12/2023 04:50 PM',
        'YourPE',
        'YourTemplateId'
      );
  
      console.log('SMS sent successfully:', response);
    } catch (error) {
      console.error('Error:', error);
    }
  }


  function getFormattedDate() {
    // Get today's date
    const today = new Date();
  
    // Define options for date formatting
    const options = {
      year: 'numeric',
      month: 'short',
      day: 'numeric'
    };
  
    // Format the date using toLocaleDateString
    const formattedDate = today.toLocaleDateString('en-US', options);
  
    return formattedDate;
  }
  
  async function sendMail(paymentsData){
    try {
      const mailTO=paymentsData.billing_email;
      const mailText="Demo Text Area";
      const currentDate=getFormattedDate();
      const formattedDate = paymentsData.pickup_date.toDateString() + " " + paymentsData.pickup_date.getFullYear();
      
      const mailHtml=HtmlEmailTemplate(paymentsData.billing_name,paymentsData.billing_mobile,paymentsData.trip_type,formattedDate,paymentsData.pickup_time,paymentsData.pickup_location,paymentsData.drop_location,paymentsData.car_type,paymentsData.total,paymentsData.paid_amount,currentDate,paymentsData.transaction_id,paymentsData.billing_email,paymentsData.night_charges,paymentsData.driver_allowance,paymentsData.car_price);

  
      // Use the authToken to send SMS
    const response=await SendMail(mailTO,mailText,mailHtml)
      console.log('Email sent successfully:', response);
    } catch (error) {
      console.error('Error:', error);
    }
  }
  

  const handleButtonClick = () => {
    // Validation logic for GuestDetailPage
    const missingFields = [
      firstNameRef,
      lastNameRef,
      emailRef,
      contactRef,
    ].filter((ref) => !ref.current || !ref.current.value);

    if (missingFields.length > 0) {
      setIsValid(false);

      // Focus on the first missing field
      missingFields[0].current.focus();
      return;
    }else{
      setIsValid(true);
    }

    const updatedObject = {
      firstName:firstNameRef.current.value,
      lastName:lastNameRef.current.value,
      email: emailRef.current.value,
      contact: contactRef.current.value,
      request: requestRef.current.value||"",
      source: journeyData.source,
      destination: journeyData.destination,
      tripType:journeyData.selectedValue,
      startDate:journeyData.startDate,
      returnDate:journeyData.returnDate,
      startTime:journeyData.startTime,
      returnTime:journeyData.returnTime,
      totalPayment:totalFare,
      paymentDone:payableAmount,
      paymentRemaining:totalFare-payableAmount,
    };
    setPaymentData(updatedObject);
 

    displayRazorpay();
 

  };



  return (
    <section className="section-b-space bg-inner animated-section">
      <Animation />
      <div className="container">
        <div className="row">
          <TravelInfo
            isValid={isValid}
            contactRef={contactRef}
            emailRef={emailRef}
            lastNameRef={lastNameRef}
            firstNameRef={firstNameRef}
            requestRef={requestRef}
            desiredcar={desiredcar}
            payableAmount={payableAmount}
          />
          <Summary
          paymentData={paymentData}
            isValid={isValid}
            handleButtonClick={handleButtonClick}
            desiredcar={desiredcar}
            payableAmount={payableAmount}
            setpayableAmount={setpayableAmount}
            setDriverAllowance={setDriverAllowance}
            driverAllowance={driverAllowance}
            setNight={setNight}
            night={night}
          />
        </div>
      </div>
    </section>
  );
};

export default Booking;
