import Navbar from "../Components/Common/Navbar";

function Layout({  title }) {
  return (
    <>
      <header className={title}>
        <div className="container">
          <div className="row">
            <div className="col">
              <div className="menu">
                <Navbar />
              </div>
              
            </div>
          </div>
        </div>
       
      </header>
      
      
    </>
  );
}

export default Layout;
