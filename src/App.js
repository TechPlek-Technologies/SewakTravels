import { useRoutes } from 'react-router-dom';
import './App.css';
import Home from './Pages/Home';
import CabListing from './Pages/CabListing';

function App() {
  
  const routes = useRoutes([
    { path: '/', element: <Home /> },
    { path: '/cab/listing', element: <CabListing/> },
]);

  return routes;

}

export default App;
