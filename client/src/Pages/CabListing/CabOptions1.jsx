import React from "react";
import CabRoute from "./CabRoute";
import CabRoute1 from "./CabRoute1";
import CabTable from "./CabTable";

const CabOptions1 = () => {

  return (
    <section id="top-cab-routes" className="bg-inner">
      <div className="container">
        <CabRoute/>

        <div className="bg-white p-3 pt-lg-0 px-lg-0 best-box-shadow">
          <CabRoute1/>

          <CabTable />

        </div>
      </div>
    </section>
  );
};

export default CabOptions1;