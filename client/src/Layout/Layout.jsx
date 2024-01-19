import { Helmet } from "react-helmet";
import Logo from "../Components/Common/Logo/Logo";
import Navbar from "../Components/Common/Navbar";
import TapToTop from "../Components/Common/TapToTop";

function Layout({  title }) {
  return (
    <>
    <Helmet>
    <meta name="robots" content="index, follow"/>
    </Helmet>
   
      <header className={title}>
        <div className="container">
          <div className="row">
            <div className="col">
              <div className="menu">
                <Logo/>
                <Navbar />
              </div>
              
            </div>
          </div>
        </div>
       <TapToTop/>
      </header>
      
      
    </>
  );
}

export default Layout;
