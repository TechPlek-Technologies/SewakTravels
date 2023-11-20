import { Link } from "react-router-dom";
import FooterComponent from "../../Components/Common/FooterComponent";
import Layout from "../../Layout/Layout";

const RefundPolicy = () => {
  return (
    <>
      <Layout title="light_header" userBgClass="user user-light" />
      <div>
        <div>
          <h1 style={{ textAlign: "center" }}>Refund Policy</h1>
        </div>

        <div className="card">
          <div className="card-body">
            The company reserves the right to determine the quantum of refund
            payable in case of cancellation or amendment of a Tour due to Force
            Majeure or Vis Majeure. Such refund would be based on various
            factors like the number of participants, the cancellation policies
            of suppliers like hoteliers, transport operators, etc. and the
            decision of the company on the quantum of refund shall be final.
            Even in case of tour for which the payment was made in foreign
            currency with or without part payment in Indian rupees, the said
            refund shall be made only in Indian rupees at the prevailing buying
            rate of exchange on the date of refund as per existing Rules &
            Regulations. It would take at least 45 days to process such refunds.
          </div>
          <div className="card-body">
            In case of the Company exercising its discretionary rights to alter,
            amend or cancel any Tour or holiday advertised, the Client who has
            booked for such Tour can exercise the option: To continue with the
            Tour as altered or amended; or To accept any alternative Tour, which
            the Company may offer; or To unconditionally accept the return of
            the tour cost charges (after deduction of the actual expenses
            incurred by us on your booking like ticket voiding charges, other
            overheads as applicable from case to case) in full and final
            settlement and the company shall not be liable to pay the client,
            compensation, consequential loss, damages, additional expenses or
            interest charges over and above as is computed by the Company as per
            these 'Terms & Conditions'. The Client will not be entitled to make
            any grievance thereafter in respect of the same.
          </div>
          <div className="card-header">
            <h5>Cancellation and Returns</h5>
          </div>
          <div className="card-body">
            You may cancel the booking 24 hour prior to the time of journey,
            without any cancellation charges for all services. In case
            cancellation or shorting of the trip is requested within 24 hours of
            the pick-up time, then following rules will apply:
            <ol>
              <li>
                Multi Day trip: The charge for the first day would be deducted
                from the total amount and refund will be issued to the user.
              </li>
              <li>
                Single Day trip/ Airport transfer: No Refund will be issued to
                the user.
              </li>
              <li>
                Airport transfer: No Cancellation Charges if Cancelled at least
                2 hours prior of pickup time.
              </li>
            </ol>
          </div>
          <div className="card-body">
            If you are eligible for refunds based on the "Cancellation and
            Returns" policy above, then the refund will be remitted back to you
            in 5-7 working days. In case of any issues, write to us at{" "}
            <span>
              <Link to="mailto:info@sewakcabs.com">info@sewakcabs.com </Link>
            </span>
            or call us at
            <span>
              <Link to="tel:+91-8377828828">+91-837-782-8828</Link>
            </span>
          </div>
        </div>
      </div>

      <FooterComponent />
    </>
  );
};

export default RefundPolicy;
