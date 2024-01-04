import Logo from "../Components/Common/Logo/Logo";
import Navbar from "../Components/Common/Navbar";
import TapToTop from "../Components/Common/TapToTop";

function Layout({  title }) {
  return (
    <>
   
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
