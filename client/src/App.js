import { useRoutes } from 'react-router-dom';
import './App.css';
import Home from './Pages/Home';
import CabListing from './Pages/CabListing';
// import Blogs from './Pages/Blogs';
// import BlogDetails1 from './Pages/BlogDetails/BlogDetails1';
import CabDetails from './Pages/CabDetails';
import Contactus from './Pages/Contactus';
import Faq from './Pages/Faq';
import NotFoundPage from './Components/Common/NotFoundPage';
import PrivacyPolicy from './Pages/Other/PrivacyPolicy';
import TermsAndCondition from './Pages/Other/TermsAndCondition';
import RefundPolicy from './Pages/Other/RefundPolicy';
import Service from './Pages/Services/Service';
import ComingSoon from './Pages/ComingSoon';
import About from './Pages/About';
import Outstation from './Pages/Services/Outstation';
import Airport from './Pages/Services/Airport';
import Corporate from './Pages/Services/Corporate';
import { useEffect } from 'react';
import axios from 'axios';
// import './scss/globals.scss'
function App() {

  useEffect(() => {
    // Define the API endpoint
    const apiUrl = 'http://localhost:5000/api';

    // Make the API call
    axios.get(apiUrl)
      .then(response => {
        // Handle the API response data here
        console.log('API Response:', response.data);
      })
      .catch(error => {
        // Handle API call errors here
        console.error('API Error:', error);
      });
  }, []);
  
  const routes = useRoutes([
    { path: '/', element: <Home /> },
    {path: '/blogs', element: <ComingSoon/>},
    // {path: '/blogs/:id', element: <BlogDetails1/>},
    {path: '/journey-details/:page?', element: <CabDetails/>},
    { path: '/cab/listing/:source?/:destination?', element: <CabListing/> },
    { path: '/contact', element: <Contactus/> },
    { path: '/about', element: <About/> },
    { path: '/service', element: <Service/> },
    { path: '/service/outstation', element: <Outstation/> },
    { path: '/service/airport', element: <Airport/> },
    { path: '/service/corporate', element: <Corporate/> },
    { path: '/FAQ', element: <Faq/> },
    { path: '/privacy-policy', element: <PrivacyPolicy/> },
    { path: '/terms-and-conditon', element: <TermsAndCondition/> },
    { path: '/refund-policy', element: <RefundPolicy/> },
]);

  return routes;

}

export default App;
