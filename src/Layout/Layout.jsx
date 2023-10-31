import Navbar from "../Components/Common/Navbar";

function Layout({ children, title }) {
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
      {children}
      
    </>
  );
}

export default Layout;
