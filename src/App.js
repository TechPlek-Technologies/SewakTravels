import { useRoutes } from 'react-router-dom';
import './App.css';
import Home from './Pages/Home';
import CabListing from './Pages/CabListing';
import Blogs from './Pages/Blogs';
import BlogDetails1 from './Pages/BlogDetails/BlogDetails1';
import CabDetails from './Pages/CabDetails';
import Contactus from './Pages/Contactus';
// import './scss/globals.scss'
function App() {
  
  const routes = useRoutes([
    { path: '/', element: <Home /> },
    {path: '/blogs', element: <Blogs/>},
    {path: '/blogs/:id', element: <BlogDetails1/>},
    {path: '/cab-details/:page?', element: <CabDetails/>},
    { path: '/cab/listing/:source?/:destination?', element: <CabListing/> },
    { path: '/contact', element: <Contactus/> }
]);

  return routes;

}

export default App;
