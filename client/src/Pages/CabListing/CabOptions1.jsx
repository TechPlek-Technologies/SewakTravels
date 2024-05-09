import React from "react";
import CabRoute from "./CabRoute";
import CabRoute1 from "./CabRoute1";
import CabTable from "./CabTable";

const CabOptions1 = ({source}) => {

  function getFirstWord(str) {
    // Split the string into an array of words
    let words = str?.split(", ");
    // Return the first word (if it exists)
    if (words?.length > 0) {
        return words[0];
    } else {
        return words; // Return an empty string if the input string is empty
    }
}
 
const source1 = getFirstWord(source);

  return (
    <section id="top-cab-routes" className="bg-inner cab-route-mrgn">
      <div className="container">
        <CabRoute source={source1}/>

        <div className="bg-white p-3 pt-lg-0 px-lg-0 best-box-shadow">
          <CabRoute1 source={source1}/>

          <CabTable source={source1}/>

        </div>
      </div>
    </section>
  );
};

export default CabOptions1;