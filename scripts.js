const check = document.getElementById("checkout");

document.getElementById('Hide-btn').addEventListener('click', function() {
  var sidebar = document.getElementById('sidebar');
  var container = document.getElementById('container');
  sidebar.classList.toggle('hidden');
  container.classList.toggle('shifted');
});



document.addEventListener('DOMContentLoaded', function() {
  const addToCartButtons = document.querySelectorAll('.add-to-cart');

  addToCartButtons.forEach(button => {
      button.addEventListener('click', addToCartClicked);
  });

  function addToCartClicked(event) {
      const button = event.target;
      const productName = button.dataset.name;
      const productPrice = parseFloat(button.dataset.price);
      
      let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

      const existingItemIndex = cartItems.findIndex(item => item.name === productName);

      if (existingItemIndex !== -1) {
          cartItems[existingItemIndex].quantity++;
      } else {
          cartItems.push({ name: productName, price: productPrice, quantity: 1 });
      }
      
      localStorage.setItem('cartItems', JSON.stringify(cartItems));
      
      populateCheckoutTable();
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const checkoutTableBody = document.querySelector('#checkout-table tbody');
  const totalPriceElement = document.getElementById('total-price');
  const checkoutButton = document.getElementById('checkout-button');

  function populateCheckoutTable() {
      checkoutTableBody.innerHTML = '';

      const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
      let totalPrice = 0;

      cartItems.forEach((item, index) => {
          const row = checkoutTableBody.insertRow();
          const nameCell = row.insertCell(0);
          const priceCell = row.insertCell(1);
          const quantityCell = row.insertCell(2);
          const actionCell = row.insertCell(3);

          nameCell.textContent = item.name;
          priceCell.textContent = 'PHP ' + (item.price * item.quantity).toFixed(2);
          quantityCell.innerHTML = `<button class="quantity-btn" data-index="${index}" data-type="decrease">-</button> ${item.quantity} Hours <button class="quantity-btn" data-index="${index}" data-type="increase">+</button>`;
          actionCell.innerHTML = `<button class="remove-item" data-index="${index}">Remove</button>`;

          totalPrice += item.price * item.quantity;
      });

      totalPriceElement.textContent = 'PHP ' + totalPrice.toFixed(2);

      document.querySelectorAll('.quantity-btn').forEach(btn => {
          btn.addEventListener('click', updateQuantity);
      });
  }

  
  populateCheckoutTable();

  
  checkoutTableBody.addEventListener('click', function(event) {
      if (event.target.classList.contains('remove-item')) {
          const indexToRemove = parseInt(event.target.dataset.index);

          
          let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

         
          cartItems.splice(indexToRemove, 1);

        
          localStorage.setItem('cartItems', JSON.stringify(cartItems));

          
          populateCheckoutTable();
      }
  });

  
  function updateQuantity(event) {
      const button = event.target;
      const index = parseInt(button.dataset.index);
      const type = button.dataset.type;
      
     
      let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

      if (type === 'decrease') {
          if (cartItems[index].quantity > 1) {
              cartItems[index].quantity--; 
          }
      } else if (type === 'increase') {
          cartItems[index].quantity++; 
      }

      localStorage.setItem('cartItems', JSON.stringify(cartItems));
      
      populateCheckoutTable();
  }

  checkoutButton.addEventListener('click', function() {
      alert('Checkout process initiated!');
      localStorage.removeItem('cartItems');
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const modal1 = document.getElementById('modal1');
  const closeButton1 = modal1.querySelector('.close1');
  const checkoutButton = document.getElementById('checkout-button');

  checkoutButton.addEventListener('click', function() {
      modal1.style.display = 'block';
      populateCheckoutForm(); 
  });

  closeButton1.addEventListener('click', function() {
      modal1.style.display = 'none';
  });


  window.addEventListener('click', function(event) {
      if (event.target === modal1) {
          modal1.style.display = 'none';
      }
  });

  function populateCheckoutForm() {
      const checkoutProductsList = document.getElementById('checkout-products');
      const totalPriceSpan = document.getElementById('checkout-total-price');
      
      const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
      let totalPrice = 0;

      checkoutProductsList.innerHTML = '';

      cartItems.forEach(item => {
          const productItem = document.createElement('li');
          productItem.textContent = `${item.name} - PHP ${item.price.toFixed(2)} x ${item.quantity}`;
          checkoutProductsList.appendChild(productItem);
          totalPrice += item.price * item.quantity;
      });

      totalPriceSpan.textContent = 'PHP ' + totalPrice.toFixed(2);
  }

});


function openModal() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Swedish Massage';
  modalPrice.textContent = 'Price: 349 PHP';
  modalImage.src = '/image/swedish.jpg';
  modalDescription.textContent = ' Swedish massage is one of the most popular and widely practiced forms of therapeutic massage. It is renowned for its ability to promote relaxation, alleviate muscle tension, and enhance overall well-being. This classic massage technique is perfect for those new to massage or anyone seeking a soothing and rejuvenating experience. Swedish massage is suitable for almost everyone, from those experiencing chronic pain and muscle tension to individuals simply seeking a relaxing escape from daily stress. It is an excellent choice for anyone looking to improve their physical and mental health through the power of touch. Experience the rejuvenating effects of a Swedish massage and discover why it remains a timeless favorite in the world of therapeutic bodywork.';

  modal.style.display = 'block';
}

function openModal1() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Combination Massage';
  modalPrice.textContent = 'Price: 369';
  modalImage.src = '/image/Combi.jpg';
  modalDescription.textContent = 'Combination massage is a versatile and customized form of bodywork that integrates techniques from various massage modalities to address individual needs and preferences. By blending elements from different styles, combination massage offers a holistic approach to relaxation, pain relief, and overall wellness. During a combination massage session, the therapist will assess your specific needs and preferences to create a personalized treatment plan. You will lie on a comfortable massage table, and the therapist will use a combination of techniques to address your unique concerns. Communication is encouraged to ensure the pressure and methods used are comfortable and effective for you.';

  modal.style.display = 'block';
}

function openModal2() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Deep Tissue Massage';
  modalPrice.textContent = 'Price: 429';
  modalImage.src = '/image/Deep.jpg';
  modalDescription.textContent = 'Deep tissue massage is a therapeutic technique focused on realigning deeper layers of muscles and connective tissue. This type of massage is especially beneficial for individuals with chronic pain, muscle stiffness, or injuries. By applying sustained pressure and slow, deep strokes, deep tissue massage helps to alleviate tension, improve mobility, and promote healing. Deep tissue massage is a therapeutic technique focused on realigning deeper layers of muscles and connective tissue. This type of massage is especially beneficial for individuals with chronic pain, muscle stiffness, or injuries. By applying sustained pressure and slow, deep strokes, deep tissue massage helps to alleviate tension, improve mobility, and promote healing.';

  modal.style.display = 'block';
}

function openModal3() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Foot Refloxology';
  modalPrice.textContent = 'Price: 389';
  modalImage.src = '/image/Foot Reflexology.jpg';
  modalDescription.textContent = 'During a foot reflexology massage session, you will typically sit or lie comfortably while the therapist works on your feet. The session usually starts with a warm-up of gentle massage to relax the feet, followed by targeted pressure on specific reflex points. The therapist may use lotion or oil to facilitate smooth movements. Communication is encouraged to adjust the pressure and ensure your comfort.';

  modal.style.display = 'block';
}

function openModal4() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Hand Refloxology';
  modalPrice.textContent = 'Price: 359';
  modalImage.src = '/image/Hand Reflexology.jpg';
  modalDescription.textContent = 'Hand reflexology is a therapeutic practice that involves applying pressure to specific points on the hands. These points, or reflex zones, are believed to correspond to various organs and systems in the body. By stimulating these reflex areas, hand reflexology aims to promote overall health, relieve stress, and address various health concerns. During a hand reflexology session, you will typically be seated comfortably while the therapist works on your hands. The session often begins with a warm-up involving gentle massage to relax the hands, followed by targeted pressure on specific reflex points. The therapist may use lotion or oil to facilitate smooth movements and enhance comfort. Communication with the therapist is important to adjust the pressure and ensure a comfortable experience.';

  modal.style.display = 'block';
}

function openModal5() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Sports Massage';
  modalPrice.textContent = 'Price: 499';
  modalImage.src = '/image/Sports.jpg';
  modalDescription.textContent = 'Sports massage is a specialized form of massage therapy designed to enhance athletic performance, aid recovery, and prevent injuries. It targets the muscles and soft tissues used in sports and exercise, making it an essential component of an athletes training and maintenance routine. During a sports massage session, the therapist will typically begin with a warm-up to increase blood flow to the muscles Depending on your needs the session may focus on specific areas of the body that are prone to strain or injury. The therapist will use a combination of techniques to address muscle tightness, improve flexibility, and enhance recovery. Communication with your therapist is important to ensure the pressure and techniques used are effective and comfortable for you.';

  modal.style.display = 'block';
}

function openModal6() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Lymphatic Massage';
  modalPrice.textContent = 'Price: 529';
  modalImage.src = '/image/Lymphatic.jpg';
  modalDescription.textContent = 'Lymphatic massage, also known as manual lymphatic drainage, is a gentle, therapeutic technique aimed at stimulating the flow of lymph fluid throughout the body. This specialized massage helps to remove toxins, reduce swelling, and promote overall health and well-being by enhancing the function of the lymphatic system. During a lymphatic massage session, you will typically lie on a comfortable massage table in a serene environment. The therapist will use light, rhythmic strokes and gentle pressure to stimulate lymph flow. The movements are usually very gentle and methodical, focusing on key areas such as the neck, armpits, abdomen, and legs. Communication with your therapist is important to ensure the techniques are comfortable and effective.';

  modal.style.display = 'block';
}

function openModal7() {
  var modal = document.getElementById('details-modal');
  var modalTitle = document.getElementById('modal-title');
  var modalPrice = document.getElementById('modal-price');
  var modalImage = document.getElementById('modal-image');
  var modalDescription = document.getElementById('modal-description');

  modalTitle.textContent = 'Kiddie Massage';
  modalPrice.textContent = 'Price: 200';
  modalImage.src = '/image/Kiddie.jpg';
  modalDescription.textContent = 'Kiddie massage is a specialized form of therapeutic massage designed specifically for children. It uses gentle techniques to promote relaxation, improve physical and emotional well-being, and support healthy development. Kiddie massage is adapted to suit the unique needs and sensitivities of children, providing a nurturing and calming experience. During a kiddie massage session, the child will be in a comfortable and safe environment, either lying on a massage table or seated, depending on their comfort level. The therapist will use soft, gentle strokes and techniques tailored to the childs age and needs. Parents are often encouraged to be present during the session to provide additional comfort and reassurance.';

  modal.style.display = 'block';
}


function closeModal() {
  var modal = document.getElementById('details-modal');
  modal.style.display = 'none';
}


