import React, { useEffect } from 'react';
import { render } from 'react-dom';

const Root = () => {
  const formData = new FormData();
  formData.append('email', 'nvdsalehi@gmail.com');
  formData.append('password', '123');
  useEffect(
    () => {
      fetch(
        '/api/login',
        {
          method: 'POST',
          body: formData,
        },
      ).then(
        () => fetch('/api/user', { method: 'GET' }).then((r) => r.json())
          .then((r) => console.log(r)),
      );
    },
    [],
  );
  return <h1>Automatic Login</h1>;
};

render(<Root />, document.getElementById('root'));
