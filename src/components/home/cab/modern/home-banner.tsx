"use client";
import { FC, useState } from "react";
import FormTwo from "@/components/common/booking-form/form2";
import { GreatJourneyBegins } from "@/constant/constant";
import Link from 'next/link';

const HomeBanner: FC = () => {

  const [fromValue, setFromValue] = useState('');
  const [toValue, setToValue] = useState('');

  const handleSelection = (from: string, to: string) => {
    setFromValue(from);
    setToValue(to);
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
                <FormTwo onSelection={handleSelection} />
                <div className="car-select">
                  <ul>
                    <li className="active">classic</li>
                    <li>suv</li>
                    <li>luxury</li>
                  </ul>
                  {/* Use the fromValue and toValue variables from HomeBanner */}
                  <Link href={`/cab/booking?from=${encodeURIComponent(fromValue)}&to=${encodeURIComponent(toValue)}`} className="btn btn-solid">book now</Link>
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
