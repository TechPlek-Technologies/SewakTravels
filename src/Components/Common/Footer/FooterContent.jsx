import About from "./About";
import Contact from "./Contact";
import Links from "./Links";
import Location from "./Location";
import Updates from "./Updates";


const FooterContent= () => {
    return (
      <>
        <div className="footer section-b-space section-t-space">
          <div className="container">
            <div className="row order-row">
              <Contact />
              <About />
              <Location />
              <Links />
              {/* <Updates /> */}
            </div>
          </div>
        </div>
      </>
    );
  };
  
  export default FooterContent;