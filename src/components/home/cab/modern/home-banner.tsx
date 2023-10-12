"use client";
import { FC, useContext } from "react";
import FormTwo from "@/components/common/booking-form/form2";
import { BookNow, GreatJourneyBegins } from "@/constant/constant";
import Link from 'next/link';
import { CabContext } from "@/context/CabContext";

const HomeBanner: FC = () => {

  

  const context = useContext(CabContext);
  console.log(context)
  
  

  const href = `/cab/listing`;

  const handleLinkClick = () => {
    // Convert the context data to a JSON string
    const contextDataString = JSON.stringify(context);
    // Save the context data to local storage
    localStorage.setItem('cabContextData', contextDataString);
  };
  
  return (
    <section className="cab-section p-0">
      <div className="container">
        <div className="row">
          <div className="col-xl-5 col-lg-6">
            <div className="cab-content">
              <div>
                <div className="call-section">
                  <div className="call">
                    <i className="fas fa-phone-alt"></i>
                    <h2>800-5-800</h2>
                  </div>
                </div>
                <h2>{GreatJourneyBegins}</h2>
                <h3>Upto 25% off on first booking through your app</h3>
                <FormTwo />
                <div className="car-select">
                  <ul>
                    <li className="active">classic</li>
                    <li>suv</li>
                    <li>luxury</li>
                  </ul>
                  <Link onClick={handleLinkClick} href={href} className="btn btn-solid">book now</Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default HomeBanner;
