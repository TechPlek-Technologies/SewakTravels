import { useContext, useEffect, useRef, useState } from "react";
import Summary from "../Components/Booking/Summary";
import TravelInfo from "../Components/Booking/TravelInfo";
import Animation from "../Components/Common/Animation";
import { AppContext } from "../Context/JourneyContext";
import { sendSMS } from "../Utility/SendSMS";
import { PaymentContext } from "../Context/PaymentContext";
import { useParams } from "react-router-dom";
import { addBillingData } from "../Utility/ca_admin";
import { SendMail } from "../Utility/SendMail";
import { HtmlEmailTemplate } from "../Utility/EmailTemplate";
import Loader from "../Layout/Loader";

const Booking = ({ desiredcar }) => {
  const { journeyData } = useContext(AppContext);
  const { paymentData, setPaymentData } = useContext(PaymentContext);
const [totalFare,setTotalFare]=useState(paymentData.totalFare);
const [loading,setLoading]=useState(false);

const formatDate = (startDate) => {
  if (startDate instanceof Date) {
      // If startDate is already a Date object, format it based on the locale
      return startDate.toDateString();
  } else if (typeof startDate === 'string') {
      // If startDate is a string, parse it into a Date object and then format it
      const date = new Date(startDate);
      return date.toDateString();
  } else {
      // Handle other types or invalid inputs
      return "invalid date";
  }
};

  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);

    // Redirect to home page if source or destination is empty
    if (!paymentData.totalFare) {
      window.location.href = "/"; // Replace "/" with the actual path of your home page
    }else{
      setTotalFare(paymentData.totalFare)
    }
    
  }, [journeyData.source, journeyData.destination]);


  const [payableAmount, setpayableAmount] = useState(
    Math.ceil((totalFare * 15) / 100)
  );

  const [night, setNight] = useState(0);
  const [driverAllowance, setDriverAllowance] = useState(0);

  const firstNameRef = useRef(null);
  const lastNameRef = useRef(null);
  const emailRef = useRef(null);
  const contactRef = useRef(null);
  const requestRef = useRef(null);

  const [isValid, setIsValid] = useState(false);

  const params = useParams();

  async function displayRazorpay() {
    const options = {
      key: "rzp_live_EeRnadU1BUMdxW",
      amount: payableAmount * 100, // 2000 paise = INR 20, amount in paisa
      name: "Sewak Travels",
      description: "Purchase Description",
      image: "/assets/img/logo.png",
      handler: async function (response) {
        setLoading(true);
        const paymentsData = {
          transaction_id: response.razorpay_payment_id,
          billing_name:
            firstNameRef.current.value + " " + lastNameRef.current.value,
          billing_email: emailRef.current.value,
          billing_mobile: contactRef.current.value,
          mode_of_payment: "RazaorPay",
          cab_type: journeyData.selectedValue,
          min_amount: payableAmount,
          trip_type: journeyData.selectedValue,
          pickup_location: journeyData.source,
          drop_location: journeyData.destination,
          pickup_date: journeyData.startDate,
          pickup_time: journeyData.startTime,
          return_date: journeyData.returnDate,
          return_time: journeyData.returnTime,
          distance: journeyData.travelDistance,
          duration: journeyData.travelTime,
          driver_allowance: driverAllowance,
          night_charges: night,
          car_type:
            params.id === "1"
              ? "Sedan"
              : params.id === "2"
              ? "SUV"
              : "prime SUV",
          discount: paymentData?.discount || null,
          sub_total: totalFare,
          order_comments: requestRef.current.value || "",
          total: totalFare,
          min_paid_amount: payableAmount,
          paid_amount: payableAmount,
          invoice_no: response.razorpay_payment_id,
          pick_type: journeyData.selectedValue,
          status: "success",
          send_email: 1,
          base_price: totalFare,
          car_price: params.id === "1" ? 22 : params.id === "2" ? 23.5 : 28,
        };

        const text = `Sewak Travels Cab Booking Confirmation 
        Trip Type: ${paymentsData.trip_type}
        Car Type: ${paymentsData.car_type}
        
        Pickup Location: ${paymentsData.pickup_location}
        Pickup Date: ${formatDate(paymentsData.pickup_date)}
        Pickup Time: ${paymentsData.pickup_time}
        
        Transaction ID: ${paymentsData.transaction_id}
        Total Amount: ${paymentsData.sub_total}
        Paid Amount: ${paymentsData.paid_amount}
        Remaining Amount: ${paymentsData.sub_total - paymentsData.paid_amount}
        
        Contact (for queries): +918377828828 
        Email (for queries): booking@sewaktravels.com 
        Website: https://sewaktravels.com/
        `;
        await sendSMS(paymentsData.billing_mobile,text);
        await sendMail(paymentsData);
        await addBillingData(paymentsData);
        setLoading(false);

        window.location.href = `/payment/${response.razorpay_payment_id}`;
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

  function getFormattedDate() {
    // Get today's date
    const today = new Date();

    // Define options for date formatting
    const options = {
      year: "numeric",
      month: "short",
      day: "numeric",
    };

    // Format the date using toLocaleDateString
    const formattedDate = today.toLocaleDateString("en-US", options);

    return formattedDate;
  }

  async function sendMail(paymentsData) {
    try {
      const mailTO = paymentsData.billing_email;
      const mailText = "Demo Text Area";
      const currentDate = getFormattedDate();
      const formattedDate = formatDate(paymentsData.pickup_date);

      const mailHtml = HtmlEmailTemplate(
        paymentsData.billing_name,
        paymentsData.billing_mobile,
        paymentsData.trip_type,
        formattedDate,
        paymentsData.pickup_time,
        paymentsData.pickup_location,
        paymentsData.drop_location,
        paymentsData.car_type,
        paymentsData.total,
        paymentsData.paid_amount,
        currentDate,
        paymentsData.transaction_id,
        paymentsData.billing_email,
        paymentsData.night_charges,
        paymentsData.driver_allowance,
        paymentsData.car_price
      );

      // Use the authToken to send SMS
      const response = await SendMail(mailTO, mailText, mailHtml,"Booking Confirmation ✔");
      console.log("Email sent successfully:", response);
    } catch (error) {
      console.error("Error:", error);
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
  
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mobileRegex = /^[6-9]\d{9}$/;
  
    const emailValid = emailRegex.test(emailRef.current.value);
    const contactValid = mobileRegex.test(contactRef.current.value);
  
    if (missingFields.length > 0 || !emailValid || !contactValid) {
      setIsValid(true);
  
      // Focus on the first missing field
      if (missingFields.length > 0) {
        missingFields[0].current.focus();
      } else if (!emailValid) {
        emailRef.current.focus();
      } else {
        contactRef.current.focus();
      }
    } else {
      setIsValid(false);
  
      const updatedObject = {
        firstName: firstNameRef.current.value,
        lastName: lastNameRef.current.value,
        email: emailRef.current.value,
        contact: contactRef.current.value,
        request: requestRef.current.value || "",
        source: journeyData.source,
        destination: journeyData.destination,
        tripType: journeyData.selectedValue,
        startDate: journeyData.startDate,
        returnDate: journeyData.returnDate,
        startTime: journeyData.startTime,
        returnTime: journeyData.returnTime,
        totalPayment: totalFare,
        paymentDone: payableAmount,
        paymentRemaining: totalFare - payableAmount,
      };
      setPaymentData(updatedObject);
  
      displayRazorpay();
    }
  };
  
  // const handleButtonClick1 = async() => {
   
  //   const paymentsData = {
  //     transaction_id: "response.razorpay_payment_id",
  //     billing_name:
  //       firstNameRef.current.value + " " + lastNameRef.current.value,
  //     billing_email: emailRef.current.value,
  //     billing_mobile: "9993557535",
  //     mode_of_payment: "RazaorPay",
  //     cab_type: journeyData.selectedValue,
  //     min_amount: payableAmount,
  //     trip_type: journeyData.selectedValue,
  //     pickup_location: journeyData.source,
  //     drop_location: journeyData.destination,
  //     pickup_date: journeyData.startDate,
  //     pickup_time: journeyData.startTime,
  //     return_date: journeyData.returnDate,
  //     return_time: journeyData.returnTime,
  //     distance: journeyData.travelDistance,
  //     duration: journeyData.travelTime,
  //     driver_allowance: driverAllowance,
  //     night_charges: night,
  //     car_type:
  //       params.id === "1"
  //         ? "Sedan"
  //         : params.id === "2"
  //         ? "SUV"
  //         : "prime SUV",
  //     discount: paymentData?.discount || null,
  //     sub_total: totalFare,
  //     order_comments: requestRef.current.value || "",
  //     total: totalFare,
  //     min_paid_amount: payableAmount,
  //     paid_amount: payableAmount,
  //     invoice_no: "response.razorpay_payment_id",
  //     pick_type: journeyData.selectedValue,
  //     status: "success",
  //     send_email: 1,
  //     base_price: totalFare,
  //     car_price: params.id === "1" ? 22 : params.id === "2" ? 23.5 : 28,
  //   };

  //   const text = `Sewak Travels Cab Booking Confirmation 
  //   Trip Type: ${paymentsData.trip_type}
  //   Car Type: ${paymentsData.car_type}
    
  //   Pickup Location: ${paymentsData.pickup_location}
  //   Pickup Date: ${formatDate(paymentsData.pickup_date)}
  //   Pickup Time: ${paymentsData.pickup_time}
    
  //   Transaction ID: ${paymentsData.transaction_id}
  //   Total Amount: ${paymentsData.sub_total}
  //   Paid Amount: ${paymentsData.paid_amount}
  //   Remaining Amount: ${paymentsData.sub_total - paymentsData.paid_amount}
    
  //   Contact (for queries): +918377828828 
  //   Email (for queries): booking@sewaktravels.com 
  //   Website: https://sewaktravels.com/
  //   `;
  //   await sendSMS(paymentsData.billing_mobile,text);
  // };
  
  

  return (
    loading ? 
      <Loader/> : 
      <section className="section-b-space bg-inner animated-section">
        <Animation />
        <div className="container">
          <div className="row">
            <TravelInfo
              paymentData={paymentData}
              isValid={isValid}
              handleButtonClick={handleButtonClick}
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
